<?php
/**
 * Created by PhpStorm.
 * User: cash
 * Date: 2018/02/12
 * Time: 20:49
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = "student";

    protected $primaryKey = "id";
}