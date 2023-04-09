<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Product_Issue_Tickets extends Model
{
    use HasFactory;

    protected $fillable = [
        'fname',
        'lname',
        'productId',
        'invoice',
        'address',
        'additionalInfo',
        'zipCode',
        'place',
        'country',
        'code',
        'phone',
        'email',
        'Issue_Description',
    ];
}
