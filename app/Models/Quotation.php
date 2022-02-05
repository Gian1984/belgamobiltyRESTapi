<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quotation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'lastname',
        'firstname',
        'email',
        'phone',
        'amount',
        'transactionID',
        'cardBrand',
        'lastFour',
        'expire',
        'billing',
        'language'
    ];

}
