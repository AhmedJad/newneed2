<?php

namespace App\Criteria\Categories;

use Illuminate\Http\Request;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class CategoriesOfFieldsCriteria.
 *
 * @package namespace App\Criteria\Categories;
 */
class SubCategoriesOfFieldsCriteria implements CriteriaInterface
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
            return $model->join('products','products.sub_id ','=','subcategories.id')
                ->join('market_fields', 'market_fields.market_id', '=', 'products.market_id')
                ->whereIn('market_fields.field_id', $this->request->get('fields',[]))->select('subcategories.*')->groupBy('subcategories.id');
        }
    }
}
