<?php
/**
 * Created by PhpStorm.
 * User: cash
 * Date: 2018/02/15
 * Time: 12:02
 */

namespace App\Http\Controllers;


use App\Student;

class StudentController extends Controller
{
    public function index()
    {
       $students = Student::paginate(2);
       return view("student.index", [
           "students" => $students
       ]);
    }
}