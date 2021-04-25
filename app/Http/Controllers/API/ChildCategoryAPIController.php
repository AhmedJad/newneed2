<?php
/**
 * File name: CategoryAPIController.php
 * Last modified: 2020.05.04 at 09:04:18
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2020
 *
 */

namespace App\Http\Controllers\API;


use App\Criteria\Categories\ChildCategoriesOfFieldsCriteria;
use App\Criteria\Categories\ChildCategoriesOfMarketCriteria;
use App\Http\Controllers\Controller;
use App\Models\Childcategory;
use App\Repositories\ChildCategoryRepository;
use Illuminate\Http\Request;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Exceptions\RepositoryException;


class ChildCategoryAPIController extends Controller
{
  
    public function __construct(ChildCategoryRepository $childcategoryRepo)
    {
        $this->childcategoryRepository = $childcategoryRepo;
    }

    public function index(Request $request)
    {
        try{
            $this->childcategoryRepository->pushCriteria(new RequestCriteria($request));
            $this->childcategoryRepository->pushCriteria(new LimitOffsetCriteria($request));
            $this->childcategoryRepository->pushCriteria(new ChildCategoriesOfFieldsCriteria($request));
            $this->childcategoryRepository->pushCriteria(new ChildCategoriesOfMarketCriteria($request));

        } catch (RepositoryException $e) {
            return $this->sendError($e->getMessage());
        }
        $childcategories = $this->childcategoryRepository->all();

        return $this->sendResponse($childcategories->toArray(), 'ChildCategories retrieved successfully');
    }

    public function show($id)
    {
        if (!empty($this->childcategoryRepository)) {
            $childcategory = $this->childcategoryRepository->findWithoutFail($id);
        }

        if (empty($childcategory)) {
            return $this->sendError('Childcategory not found');
        }

        return $this->sendResponse($childcategory->toArray(), 'Childcategories retrieved successfully');
    }
}
