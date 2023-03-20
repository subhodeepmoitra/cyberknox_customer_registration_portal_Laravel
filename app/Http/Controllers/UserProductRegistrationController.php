<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserProductRegistration extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function RegistrationViewIndex(){
        return view ('user_product_registration');
    }
}
