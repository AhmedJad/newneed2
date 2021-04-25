<?php

namespace App\Criteria\Categories;

use Illuminate\Http\Request;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;


class SubCategoriesOfMarketCriteria implements CriteriaInterface
{

    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    public function apply($model, RepositoryInterface $repository)
    {
        if (!$this->request->has('market_id')) {
            return $model;
        } else {
            $id = $this->request->get('market_id');
            return $model->join('products', 'products.sub_id ', '=', 'subcategories.id')
                ->where('products.market_id', $id)
                ->select('subcategories.*')
                ->groupBy('subcategories.id');
        }
    }
}
