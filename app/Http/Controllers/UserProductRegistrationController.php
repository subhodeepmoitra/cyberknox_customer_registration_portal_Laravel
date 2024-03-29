<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\UserProductRegistrationData;
use App\Models\Customer_registration_type;
use App\Models\User_Product_Issue_Tickets;


class UserProductRegistrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function RegistrationViewIndex(){
        //user product registration view return
        return view ('user_product_registration');
    }

    public function IssueTicketViewIndex(){
        //client user issue ticket raising view return
        return view ('adminHomeIssueTickets', compact('Client_issues'));
    }


    public function UserProductRegistration(Request $request){
        $requestData = $request->all();
        $invoice = time().$request->file('invoice')->getClientOriginalName();
        $path = $request->file('invoice')->storeAs('invoice',$invoice,'public');
        $upload_path = 'invoice/';
        $requestData["invoice"] = $upload_path.$invoice;

        $data = UserProductRegistrationData::create($requestData);
        //return redirect('/home')->with('success', "Product registration details sent successfully.");

        //updating registration type to the Customer_registration_type table
        $emailData = new Customer_registration_type;
        $emailData->email = $request->email;
        $emailData->type = 1;
        $emailData->save();

        return redirect('/customer/home')->with('success', "Product registration details sent successfully.");
    }
}
