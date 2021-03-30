<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $connection = "mysql";
    protected $table = "orders_details";
    protected $fillable = [
    	"id",
        "id_request",
        "id_product",
        "amount"
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'id_request');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }
}