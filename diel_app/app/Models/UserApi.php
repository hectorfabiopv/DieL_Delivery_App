<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserApi extends Model
{
    use HasFactory;
    protected $connection = "mysql";
    protected $table = "users_api";
    protected $fillable = [
    	"id",
        "firs_name",
        "last_name",
        "email",
        "password",
        "rol",
        "phone_number",
        "api_token"
    ];
}