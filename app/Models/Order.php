<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'product_id',
        'user_id',
        'is_complete',
        'amount',
        'pickupaddress',
        'dropoffaddress',
        'duration',
        'distance',
        'date','pickupsign',
        'flight',
        'referencecode',
        'notes',
        'lastname',
        'firstname',
        'email',
        'phone',
        'is_complete'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
