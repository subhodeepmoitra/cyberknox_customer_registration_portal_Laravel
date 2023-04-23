<?php

namespace App\Http\Controllers\admin;

use Auth;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\UserProductRegistrationData;

class Admin_view_registration extends Controller
{
    public function Admin_view_registration_index($id){
        $uid = strval($id);
        //echo $uid;
        $getID = strval($id);
        $invoices = DB::table('user_product_registration_data')
            ->select('id', 'address', 'additionalInfo', 'zipCode', 'place', 'country', 'invoice', 'fname', 'lname', 'email', 'code', 'phone', 'registrationStatus', 'created_at')
            ->where('id', $uid)
            ->get();
        $id = DB::table('user_product_registration_data')
            ->select('id')
            ->where('email', Auth::user()->email);
        return view('admin.client_product_registrations_pending', compact('invoices'))->with('id', $invoices);
        //return view ('client.show_registrationDetails', compact($uid));
    }
}
