<?php

namespace App\Criteria\Categories;

use Illuminate\Http\Request;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;


class ChildCategoriesOfFieldsCriteria implements CriteriaInterface
{


    public function __construct(Request $request)
    {
        $this->request = $request;
    }
 
    public function apply($model, RepositoryInterface $repository)
    {
        if (!$this->request->has('fields')) {
            return $model;
        } else {
            $fields = $this->request->get('fields');
            if (in_array('0', $fields)) { // means all fields
                return $model;
            }
            return $model->join('products','products.child_id ','=','child_category.id')
                ->join('market_fields', 'market_fields.market_id', '=', 'products.market_id')
                ->whereIn('market_fields.field_id', $this->request->get('fields',[]))->select('child_category.*')->groupBy('child_category.id');
        }
    }
}
