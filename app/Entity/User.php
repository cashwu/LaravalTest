<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

/**
 * Created by PhpStorm.
 * User: cash
 * Date: 2018/02/13
 * Time: 13:31
 */
class User extends Model
{
    protected $table = "users";

    protected $primaryKey = "id";

    protected $fillable = [
        "email",
        "password",
        "type",
        "nickname"
    ];
}