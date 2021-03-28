<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiary extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'lastname',
        'identification',
        'bank',
        'number_account',
        'type_account',
        'mobile_payment',
        'phonenumber',
        'email',
        'id_user',
    ];
}
