<?php

namespace App\Criteria\Categories;

use Illuminate\Http\Request;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;


class ChildCategoriesOfMarketCriteria implements CriteriaInterface
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
            return $model->join('products', 'products.child_id ', '=', 'child_category.id')
                ->where('products.market_id', $id)
                ->select('child_category.*')
                ->groupBy('child_category.id');
        }
    }
}
