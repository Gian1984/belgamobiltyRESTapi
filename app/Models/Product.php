<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'pricehour','pricekm', 'description', 'image','kmhours', 'luggage', 'passengers','forfait1','forfait2',
    ];

    public function orders(){
        return $this->hasMany(Order::class);
    }
}
