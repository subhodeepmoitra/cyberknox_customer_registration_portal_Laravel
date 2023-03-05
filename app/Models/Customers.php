<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customers extends Model
{
    function addUser($data){
        DB::table('customer')->insert($data);
    }

    function getUser($email){
        $data = DB::table('customer')->where('email', $email);
        return $data;
    }
}
