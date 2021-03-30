<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $connection = "mysql";
    protected $table = "orders";
    protected $fillable = [
    	"id",
    	"id_manager",
    	"id_user_delivery",
        "id_customer",
        "date_request",
        "state"
    ];
}