<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $connection = "mysql";
    protected $table = "products";
    protected $fillable = [
    	"id",
        "title",
        "image",
        "description",
        "value_unit",
    ];
}