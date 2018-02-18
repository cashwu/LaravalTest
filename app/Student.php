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
    const SEX_UN = 10;
    const SEX_BOY = 20;
    const SEX_GIRL = 30;

    protected $table = "student";

    protected $fillable = ["name", "age", "sex"];

    // 自動新增 timestamps
    public $timestamps = true;

    public function getDateFormat()
    {
        return time();
    }

    // 日期格式不 format 直接回傳 timestamps
    // update 時這裡會出錯
//    protected function asDateTime($value)
//    {
//        return $value;
//    }

    public function getSex($ind = null)
    {
        $arr = [
            self::SEX_UN => "Unknown",
            self::SEX_BOY => "Boy",
            self::SEX_GIRL => "Girl",
        ];

        if ($ind !== null) {
            return array_key_exists($ind, $arr) ? $arr[$ind] : $arr[self::SEX_UN];
        }

        return $arr;
    }
}