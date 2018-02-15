<?php
/**
 * Created by PhpStorm.
 * User: cash
 * Date: 2018/02/15
 * Time: 12:02
 */

namespace App\Http\Controllers;


class StudentController extends Controller
{
    public function index()
    {
       return view("student.index");
    }
}