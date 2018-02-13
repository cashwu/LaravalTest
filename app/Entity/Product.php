<?php
/**
 * Created by PhpStorm.
 * User: cash
 * Date: 2018/02/13
 * Time: 15:26
 */

namespace App\Entity;


use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "product";

    protected $primaryKey = "id";

    protected $fillable = [
        "id",
        "status",
        "name",
        "name_en",
        "description",
        "description_en",
        "photo",
        "price",
        "count",
    ];
}