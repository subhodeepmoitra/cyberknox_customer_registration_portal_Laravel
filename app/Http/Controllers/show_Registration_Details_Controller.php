<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Illuminate\Http\Request;
use App\Models\UserProductRegistrationData;

class show_Registration_Details_Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function Registrastion_details_for_client(){
        $invoices = DB::table('user_product_registration_data')->select('id','invoice','fname','lname','email','phone','registrationStatus','created_at')
                                                                 ->where('email', Auth::user()->email)->get();
        //$id = DB::table('user_product_registration_data')->select('id')->where('email', Auth::user()->email);
        return view ('client.show_registrationDetails', compact('invoices'))->with('id',$invoices);
    }
}
