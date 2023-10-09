<?php

namespace App\Http\Controllers;

use App\Traits\HttpResponses;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use HttpResponses;

    public function Login()
    {
        return 'this is login';
    }

    public function Register()
    {
        return response()->json('this is register');
    }

    public function Logout()
    {
        return response()->json('this is logout');
    }
}
