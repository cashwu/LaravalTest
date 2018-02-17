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

    // 自動新增 timestamps
    public $timestamps = true;

    public function getDateFormat()
    {
        return time();
    }

    // 日期格式不 format 直接回傳 timestamps
    // update 時這裡會出錯
    protected function asDateTime($value)
    {
        return $value;
    }
}