<?php
/**
 * Created by PhpStorm.
 * User: cash
 * Date: 2018/02/15
 * Time: 12:02
 */

namespace App\Http\Controllers;


use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::paginate(10);
        return view("student.index", [
            "students" => $students
        ]);
    }

    public function create(Request $request)
    {
        if ($request->isMethod("POST")) {
            $data = $request->input("Student");
            if (Student::create($data)) {
                return redirect("/")->with("success", "add success");
            } else {
                return redirect()->back()->with("error", "add filed");
            }
        }
        return view("student.create");
    }

    public function save(Request $request)
    {
        $data = $request->input("Student");

        $student = new Student();
        $student->name = $data["name"];
        $student->age = $data["age"];
        $student->sex = $data["sex"];
        if ($student->save()) {
            return redirect("/");
        } else {
            return redirect()->back();
        }
    }
}