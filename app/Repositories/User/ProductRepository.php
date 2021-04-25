<?php
namespace App\Repositories\User;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProductRepository
{
    public function AddToCart($request)
    {
        $authUserId = Auth::user()->id;
        $cart = new Cart();
        $cart->user_id = $authUserId;
        $cart->product_id = $request->product_id;
        $cart->quantity = $request->quantity;
        $cart->save();
    }

    public function showCart()
    {
        $authUserId = Auth::user()->id;
        return User::find($authUserId)->products;
    }
}
