<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'amount'
    ];

    public function order()
    {
        return $this->belongTo(order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
