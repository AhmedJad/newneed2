<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\User\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
        $this->middleware("user-auth");
    }

    public function showProduct(Product $product)
    {
        return view("user.product.product")
            ->with("product", $product);
    }

    public function addToCart(Request $request)
    {
        $this->productRepository->addToCart($request);
    }

    public function showCart()
    {
        return view("user.product.cart")
            ->with("cartProducts", $this->productRepository->showCart());
    }

}
