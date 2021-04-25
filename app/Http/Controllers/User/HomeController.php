<?php

namespace App\Http\Controllers\User;
use App\Repositories\User\HomeRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    private $homeRepository;
    const PRODUCTS_NUMBER=4;
    function __construct(HomeRepository $homeRepository){
        $this->homeRepository=$homeRepository;
        $this->middleware("user-auth");
    }

    public function home(){
        return view("user.home")
        ->with("products",$this->homeRepository->getLatestProducts(self::PRODUCTS_NUMBER));
    }

}
