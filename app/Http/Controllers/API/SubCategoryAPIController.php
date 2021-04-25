<?php
/**
 * File name: CategoryAPIController.php
 * Last modified: 2020.05.04 at 09:04:18
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2020
 *
 */

namespace App\Http\Controllers\API;


use App\Criteria\Categories\SubCategoriesOfFieldsCriteria;
use App\Criteria\Categories\SubCategoriesOfMarketCriteria;
use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use App\Repositories\SubCategoryRepository;
use Illuminate\Http\Request;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Exceptions\RepositoryException;


class SubCategoryAPIController extends Controller
{
  
    public function __construct(SubCategoryRepository $subcategoryRepo)
    {
        $this->subcategoryRepository = $subcategoryRepo;
    }

    public function index(Request $request)
    {
        try{
            $this->subcategoryRepository->pushCriteria(new RequestCriteria($request));
            $this->subcategoryRepository->pushCriteria(new LimitOffsetCriteria($request));
            $this->subcategoryRepository->pushCriteria(new SubCategoriesOfFieldsCriteria($request));
            $this->subcategoryRepository->pushCriteria(new SubCategoriesOfMarketCriteria($request));
        } catch (RepositoryException $e) {
            return $this->sendError($e->getMessage());
        }
        $subcategories = $this->subcategoryRepository->all();

        return $this->sendResponse($subcategories->toArray(), 'SubCategories retrieved successfully');
    }

    public function show($id)
    {
        if (!empty($this->subcategoryRepository)) {
            $subcategory = $this->subcategoryRepository->findWithoutFail($id);
        }

        if (empty($subcategory)) {
            return $this->sendError('SubCategory not found');
        }

        return $this->sendResponse($subcategory->toArray(), 'SubCategory retrieved successfully');
    }
}
