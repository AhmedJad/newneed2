<?php
namespace App\Repositories\User;

use App\Models\Product;
class HomeRepository
{
    public function getLatestProducts($productsNumber)
    {
        return Product::take($productsNumber)->latest()->get();
    }

}
