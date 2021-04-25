<?php

namespace App\Http\Controllers;
use App\Models\Category;
use app\models\Subcategory;
use App\DataTables\ChildcategoryDataTable;
use App\DataTables\SubCategoryDataTable;


use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use App\Repositories\SubCategoryRepository;
use App\Repositories\CustomFieldRepository;
use App\http\Requests\CreateSubCategoryRequest;
use App\http\Requests\UpdateSubCategoryRequest;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Repositories\UploadRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Flash;


class SubCategoryController extends Controller
{
  public function __construct(SubCategoryRepository $SubcategoryRepository, CustomFieldRepository $customFieldRepo , UploadRepository $uploadRepo,
  CategoryRepository $categoryRepository)
    {
        parent::__construct();
        $this->subcategoryRepository = $SubcategoryRepository;
        $this->categoryRepository = $categoryRepository;
        $this->customFieldRepository = $customFieldRepo;
        $this->uploadRepository = $uploadRepo;
    }
    public function index(SubCategoryDataTable $subCategoryDataTable)
    { 
        return $subCategoryDataTable->render('subcategories.index');
    }
   
  
  // public function show($id){
  //   $category=Category::find($id);
  //   $subcategories= $category->subcategories;
    
  //   return view('categories.ShowSubcategories',['subcategories'=>$subcategories]);
  // }
  public function show(SubCategoryDataTable $SubCategoryDataTable){
     $category=Category::find(request()->id);
     $subcategories= $category->subcategories->first();
    $subcategories->Categories->name;
     return $SubCategoryDataTable->render('subcategories.index',['category'=>$category]);
  }

  public function create(){
    $category = $this->categoryRepository->pluck('name', 'id');

    // $Categories = Category::all();
    //     $select = [];
    //     foreach($Categories as $Category){
            
    //         $select[$Category->id] = $Category->name;
    //    }
    $hasCustomField = in_array($this->subcategoryRepository->model(),setting('custom_field_models',[]));
    if($hasCustomField){
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->subcategoryRepository->model());
        $html = generateCustomField($customFields);
    }
    return view('subcategories.create')->with("customFields", isset($html) ? $html : false)->with("category", $category);
   }

   public function store(CreateSubCategoryRequest $request)
   {
       $input = $request->all();
      //  dd($input);
      
     
       $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->subcategoryRepository->model());
       try 
       {  
        $subcategory = $this->subcategoryRepository->create($input);
          
        } 
       catch (ValidatorException $e) {
           Flash::error($e->getMessage());
       }

       Flash::success('Subcategory created successfully', ['operator' => __('lang.product')]);
       $id=$subcategory->category_id;
       return redirect(route('show-sub', $id));
   }
   public function destroy($id)
    {  
        $subcategory = $this->subcategoryRepository->findWithoutFail($id);
        $categoryid=$subcategory->category_id;

        if (empty($subcategory)) {
            Flash::error('Sub Category not found');

            return redirect(route('subcategories.index'));
        }

        $this->subcategoryRepository->delete($id);

        Flash::success('sub category deleted successfully',['operator' => __('lang.category')]);

        return redirect(route('show-sub', $categoryid));
    }
    public function edit($id)
    {
        $subcategory = $this->subcategoryRepository->findWithoutFail($id);
        $category = $this->categoryRepository->pluck('name', 'id');

        
        

        if (empty($subcategory)) {
            Flash::error(__('lang.not_found',['operator' => __('lang.category')]));

            return redirect(route('categories.index'));
        }
        $customFieldsValues = $subcategory->customFieldsValues()->with('customField')->get();
        $customFields =  $this->customFieldRepository->findByField('custom_field_model', $this->subcategoryRepository->model());
        $hasCustomField = in_array($this->subcategoryRepository->model(),setting('custom_field_models',[]));
        if($hasCustomField) {
            $html = generateCustomField($customFields, $customFieldsValues);
        }

        return view('subcategories.edit')->with('subcategory', $subcategory)->with('category', $category)->with("customFields", isset($html) ? $html : false);
    }


    public function update($id, UpdateSubCategoryRequest $request)
    {
        $subcategory = $this->subcategoryRepository->findWithoutFail($id);
        $categoryid=$subcategory->Categories->id;
       

        if (empty($subcategory)) {
            Flash::error('Sub category not found');
             return redirect(route('show-sub', $categoryid));
        }
        $input = $request->all();
        $customFields = $this->customFieldRepository->findByField('custom_field_model', $this->subcategoryRepository->model());
        try {
            $subcategory = $this->subcategoryRepository->update($input, $id);
            
            if(isset($input['image']) && $input['image']){
    $cacheUpload = $this->uploadRepository->getByUuid($input['image']);
    $mediaItem = $cacheUpload->getMedia('image')->first();
    $mediaItem->copy($subcategory, 'image');
}
            foreach (getCustomFieldsValues($customFields, $request) as $value){
                $subcategory->customFieldsValues()
                    ->updateOrCreate(['custom_field_id'=>$value['custom_field_id']],$value);
            }
        } catch (ValidatorException $e) {
            Flash::error($e->getMessage());
        }

        Flash::success('sub category updated successfully',['operator' => __('lang.category')]);

        return redirect(route('show-sub', $categoryid));
    }

}