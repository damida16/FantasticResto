<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description',
        'image'
    ];

    public function transactions(){
        return $this->hasMany(Transactions::class);
    }
    
    public function carts(){
        return $this->hasMany(Cart::class);
    }
}
