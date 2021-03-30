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
    protected $hidden = ["created_at","updated_at"];

    public function manager()
    {
        return $this->belongsTo(UserApi::class, 'id_manager');
    }


    public function user_delivery()
    {
        return $this->belongsTo(UserApi::class, 'id_user_delivery');
    }


    public function customer()
    {
        return $this->belongsTo(UserApi::class, 'id_customer');
    }


    public function details()
    {
        return $this->hasMany(OrderDetail::class, 'id_request')->with("product");
    }
}