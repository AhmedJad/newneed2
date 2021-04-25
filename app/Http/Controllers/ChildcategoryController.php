<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Subcategory;
use App\DataTables\ChildcategoryDataTable;
use App\Repositories\CategoryRepository;
use App\Repositories\ChildCategoryRepository;
use App\Http\Requests\UpdateChildCategoryRequest;

use App\Repositories\SubCategoryRepository;
use App\Repositories\CustomFieldRepository;
use App\http\Requests\CreateChildCategoryRequest;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Repositories\UploadRepository;
use Flash;

class ChildcategoryController extends Controller
{

  public function __construct(SubCategoryRepository $SubcategoryRepository, CustomFieldRepository $customFieldRepo , UploadRepository $uploadRepo,
  ChildCategoryRepository $ChildCategoryRepository)
    {
        parent::__construct();
        $this->subcategoryRepository = $SubcategoryRepository;
        $this->ChildCategoryRepository = $ChildCategoryRepository;
        $this->customFieldRepository = $customFieldRepo;
        $this->uploadRepository = $uploadRepo;
    }
    public function showChild(ChildcategoryDataTable $ChildcategoryDataTable){
        $subcategory=Subcategory::find(request()->id);
        // dd($subcategory->Categories->name);
   
        return $ChildcategoryDataTable->render('childcategory.index',['subcategory'=>$subcategory]);
      }
      public function create(){
        $subcategory = $this->subcategoryRepository->pluck('name', 'id');
    
      
        $hasCustomField = in_array($this->ChildCategoryRepository->model(),setting('custom_field_models',[]));
        if($hasCustomField){
            $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->ChildCategoryRepository->model());
            $html = generateCustomField($customFields);
        }
        return view('childcategory.create')->with("customFields", isset($html) ? $html : false)->with("subcategory", $subcategory);
        
       }
       public function store(CreateChildCategoryRequest $request)
   {
       $input = $request->all();
      //  dd($input);
      
     
       $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->ChildCategoryRepository->model());
       try 
       {  
        $childcategory = $this->ChildCategoryRepository->create($input);
          // dd($childcategory);
        } 
       catch (ValidatorException $e) {
           Flash::error($e->getMessage());
       }

       Flash::success('Subcategory created successfully', ['operator' => __('lang.product')]);
       $id=$childcategory->subcategory_id;
       return redirect(route('show-child',$id));
   }

   public function edit($id)
   {
       $childcategory = $this->ChildCategoryRepository->findWithoutFail($id);
       $subcategory = $this->subcategoryRepository->pluck('name', 'id');
       $subcategoryid=$childcategory->Subcategories->id;
      
       if (empty($childcategory)) {
           Flash::error(__('lang.not_found',['operator' => __('lang.category')]));

           return redirect(route('show-child', $subcategoryid));
       }
       $customFieldsValues = $childcategory->customFieldsValues()->with('customField')->get();
       $customFields =  $this->customFieldRepository->findByField('custom_field_model', $this->ChildCategoryRepository->model());
       $hasCustomField = in_array($this->ChildCategoryRepository->model(),setting('custom_field_models',[]));
       if($hasCustomField) {
           $html = generateCustomField($customFields, $customFieldsValues);
       }

       return view('childcategory.edit')->with('childcategory', $childcategory)->with('subcategory', $subcategory)->with("customFields", isset($html) ? $html : false);
   }


   public function update($id, UpdateChildCategoryRequest $request)
   {
       $childcategory = $this->ChildCategoryRepository->findWithoutFail($id);
       $subcategoryid=$childcategory->Subcategories->id;
       
   
       

       if (empty($childcategory)) {
           Flash::error('child category not found');
           return redirect(route('show-child', $subcategoryid));
          
          }
       $input = $request->all();
       $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->subcategoryRepository->model());
       try {
           $cildcategory = $this->ChildCategoryRepository->update($input, $id);
           
           if(isset($input['image']) && $input['image']){
   $cacheUpload = $this->uploadRepository->getByUuid($input['image']);
   $mediaItem = $cacheUpload->getMedia('image')->first();
   $mediaItem->copy($cildcategory, 'image');
}
           foreach (getCustomFieldsValues($customFields, $request) as $value){
               $subcategory->customFieldsValues()
                   ->updateOrCreate(['custom_field_id'=>$value['custom_field_id']],$value);
           }
       } catch (ValidatorException $e) {
           Flash::error($e->getMessage());
       }

       Flash::success('child category updated successfully',['operator' => __('lang.category')]);
      
       return redirect(route('show-child', $subcategoryid));
     
   }
   public function destroy($id)
    {  
        $childcategory = $this->ChildCategoryRepository->findWithoutFail($id);
        $subcategoryid=$childcategory->Subcategories->id;

        if (empty($childcategory)) {
            Flash::error('child Category not found');

            return redirect(route('show-child', $subcategoryid));
          }

        $this->ChildCategoryRepository->delete($id);

        Flash::success('child category deleted successfully',['operator' => __('lang.category')]);

        return redirect(route('show-child', $subcategoryid));
      }
    
}
