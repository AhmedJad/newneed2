<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\RegisterRequest;
use App\Repositories\User\AuthRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    private $authRepository;
    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
        $this->middleware("user-guest")->except("logout");
    }

    public function registerView()
    {
        return view("user.auth.register");
    }

    public function register(RegisterRequest $request)
    {
        $this->authRepository->create($request->input());
        return $this->login($request);
    }

    public function loginView()
    {
        return view("user.auth.login");
    }

    public function login()
    {
        if (auth()->attempt(['email' => request('email'), 'password' => request('password')])) {
            return redirect("user/home");
        } else {
            session()->flash('error', "Email or password isn't correct");
            return redirect("user/login");
        }

    }

    public function logout(){
        Auth::logout();
        return redirect("user/login");
    }
}
