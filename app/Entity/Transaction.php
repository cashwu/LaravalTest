<?php
/**
 * Created by PhpStorm.
 * User: cash
 * Date: 2018/02/13
 * Time: 15:31
 */

namespace App\Entity;


use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = "transaction";

    protected $primaryKey = "id";

    protected $fillable = [
        "id",
        "user_id",
        "product_id",
        "price",
        "count",
        "total_price",
    ];
}