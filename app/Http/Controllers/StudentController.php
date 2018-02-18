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
        $student = new Student();

        if ($request->isMethod("POST")) {

            // controller validate
//            $this->validate($request, [
//                "Student.name" => "required|min:2|max:20",
//                "Student.age" => "required|integer",
//                "Student.sex" => "required|integer"
//            ], [
//                "required" => ":attribute 必填",
//                "min" => ":attribute 長度不符合要求",
//                "integer" => ":attribute 為整數"
//            ], [
//                "Student.name" => "Name",
//                "Student.age" => "Age",
//                "Student.sex" => "Sex",
//            ]);

            // validate class

            $validator = \Validator::make($request->input(),
                [
                    "Student.name" => "required|min:2|max:20",
                    "Student.age" => "required|integer",
                    "Student.sex" => "required|integer"
                ], [
                    "required" => ":attribute 必填",
                    "min" => ":attribute 長度不符合要求",
                    "integer" => ":attribute 為整數"
                ], [
                    "Student.name" => "Name",
                    "Student.age" => "Age",
                    "Student.sex" => "Sex",
                ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data = $request->input("Student");
            if (Student::create($data)) {
                return redirect("/")->with("success", "add success");
            } else {
                return redirect()->back()->with("error", "add filed");
            }
        }
        return view("student.create", [
            "student" => $student
        ]);
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

    public function update(Request $request, $id)
    {
        $student = Student::find($id);

        if ($request->isMethod("POST")) {

            $this->validate($request, [
                "Student.name" => "required|min:2|max:20",
                "Student.age" => "required|integer",
                "Student.sex" => "required|integer"
            ], [
                "required" => ":attribute 必填",
                "min" => ":attribute 長度不符合要求",
                "integer" => ":attribute 為整數"
            ], [
                "Student.name" => "Name",
                "Student.age" => "Age",
                "Student.sex" => "Sex",
            ]);

            $data = $request->input("Student");
            $student->name = $data["name"];
            $student->age = $data["age"];
            $student->sex = $data["sex"];

            if ($student->save()) {
                return redirect("/")->with("success", "update success");
            }
        }

        return view("student.update", [
            "student" => $student
        ]);
    }

    public function detail($id)
    {
        $student = Student::find($id);

        return view("student.detail", [
            "student" => $student
        ]);
    }

    public function delete($id)
    {
        $student = Student::find($id);

        if ($student->delete()) {
            return redirect("/")->with("success", "delete success");
        } else {
            return redirect("/")->with("error", "delete failed");
        }
    }
}