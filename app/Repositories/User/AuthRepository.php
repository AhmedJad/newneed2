<?php

namespace App\Repositories\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
class AuthRepository
{

    public function create($userData)
    {
        $userData["password"]=Hash::make($userData["password"]);
        return User::create($userData);
    }
}
