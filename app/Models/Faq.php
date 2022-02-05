<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;


class Faq extends Model
{
    use HasFactory, SoftDeletes, HasApiTokens;

    protected $fillable = [
        'product_id', 'user_id','order_id', 'name', 'email', 'phone', 'question','language'
    ];

    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function users(){
        return $this->hasMany(User::class);
    }
}
