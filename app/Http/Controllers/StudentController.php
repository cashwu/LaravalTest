<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    public function test1()
    {
        // $students = DB::select('select * from student where id = ?', [ 1 ]);
        // dd($students);

        // $bool = DB::insert('insert into student (name, age) values (?, ?)', ['cash', '18']);
        // var_dump($bool);

        // $num = DB::update('update student set age = ? where name = ?', ['20', 'cash']);
        // var_dump($num);

        // $num = DB::delete('delete from student where id = ?', [1]);
        // var_dump($num);
    }

    public function query()
    {
        // $num = DB::table('student') -> insert(['name' => 'tt', 'age' => 18]);
        // var_dump($num);

        // $id = DB::table('student') -> insertGetId(['name' => 'tttttt', 'age' => 18]);
        // var_dump($id);

        $bool = DB::table('student')->insert([
            ['name' => 'tt1', 'age' => 18],
            ['name' => 'tt2', 'age' => 20]
        ]);
        var_dump($bool);
    }

    public function update()
    {
        // $num = DB::table('student')
        //     ->where('id', 2)
        //     ->update(['age' => 30]);

        // $num = DB::table("student") ->increment("age");
        // $num = DB::table("student") ->increment("age", 3);
        // $num = DB::table("student") ->decrement("age");
        // $num = DB::table("student") ->decrement("age", 3);

        // $num = DB::table("student")
        //         ->where("id", 2)
        //         ->increment("age");

        $num = DB::table("student")
            ->where("id", 2)
            ->decrement("age", 2, ["name" => "ddee"]);

        var_dump($num);
    }

    public function delete()
    {
        // $num = DB::table("student")
        //         ->where("id", 5)
        //         ->delete();

        // $num = DB::table("student")
        //         ->where("id", ">=", 3)
        //         ->delete();

        // var_dump($num);

        // DB::table("student")->truncate();
    }

    public function select()
    {
        // 設定假資料
        // $bool = DB::table("student")
        //     ->insert([
        //         ["id"=> 1, "name"=> "name1", "age"=> 18],
        //         ["id"=> 3, "name"=> "name2", "age"=> 19],
        //         ["id"=> 4, "name"=> "name3", "age"=> 20],
        //         ["id"=> 5, "name"=> "name4", "age"=> 21],
        // ]);

        // $students = DB::table("student")->get();

        // $student = DB::table("student")->first();

        // $student = DB::table("student")
        //         ->orderBy("id", "desc")
        //         ->first();

        // $student2 = DB::table("student")
        //         ->where("id", ">=", "2")
        //         ->get();

        // $student = DB::table("student")
        //         ->whereRaw("id >= ? and age > ? ", [ 2, 20 ])
        //         ->get();

        // $names = DB::table("student") ->pluck("name");

        // error 
        // $names = DB::table("student")
        //         -> lists("name", "id");

        // $students = DB::table("student")
        //         ->select("id", "name", "age")
        //         ->get();

        // dd($students);

        echo "<pre>";
        // DB::table("student")
        //         -> orderBy("id")
        //         -> chunk(2, function($students){
        //             var_dump($students);
        //             return false;
        // });

    }

    public function aggregate()
    {
        // $num = DB::table("student")->count();

        // $max = DB::table("student")->max("age");

        // $min = DB::table("student")->min("age");

        // $avg = DB::table("student")->avg("age");

        $sum = DB::table("student")->sum("age");
        var_dump($sum);
    }

    public function orm()
    {
        // all
//        $students = Student::all();

        // find one
//        $student = Student::find(3);

        // find or fail => page not found
//        $student = Student::findOrFail(1);

//        $student = Student::get();

//        $student = Student::where("id", ">", "2")
//                -> orderBy("age", "desc")
//                -> first();

//        dd($student);

//        echo "<pre>";
//        Student::chunk(2, function($students) {
//            dd($students);
//        });

        // aggregate

//        $num = Student::count()ction CheckinProject

        $num = Student::where("id", ">", "2")
            ->max("age");

        dd($num);
    }

    public function ormCreate()
    {
//        $student = new Student();
//        $student->name = "cc";
//        $student->age = "22";
//
//        $bool = $student->save();
//
//        dd($bool);

//        $student = Student::find(10);
//        echo date("Y-m-d H:i", $student->created_at);

        // 使用 model create，預設不可以批次新增
//        $student = Student::create(
//            ["name" => "tc", "age" => 3]
//        );
//        dd($student);


        // firstOrCreate
        // 用屬性尋找，找不到就新增，找到就直接返回當個
//        $student = Student::firstOrCreate(
//            ["name" => "td"]
//        );
//        dd($student);

        // firstOrNew
        // 用屬性尋找，找不到就返回物件，不新增到 DB
        $student = Student::firstOrNew(
            ["name" => "tdww"]
        );
        $bool = $student->save();
        dd($student);
    }

    public function ormUpdate()
    {
        // 通過 model 更新數據

//        $student = Student::find(11);
//        $student->name= "ccc";
//        $bool = $student->save();
//        dd($bool);

        $num = Student::where("id", ">", "10")
            ->update(["age" => 55]);
        dd($num);
    }

    public function ormDelete()
    {
        // 通過 model 刪除
//        $student = Student::find(6);
//        $bool = $student->delete();
//        dd($bool);

        // 通過主鍵刪除
//        $num = Student::destroy(7);
        $num = Student::destroy(8, 9);
//        $num = Student::destroy([4,5]);
//        dd($num);

//        $num = Student::where("id", "=", "1")->delete();
//        dd($num);
    }

    public function section()
    {
        $students = []; //Student::get();

        $name = "cash";
        $arr = ["cash", "B"];

        return View("student.section",
            [
                "name" => $name,
                "arr" => $arr,
                "students" => $students,
            ]
        );
    }

    public function url()
    {
        return "url";
    }

    public function request(Request $request)
    {
        // 1, 取值
//        echo $request->input("name");
//        echo $request->input("sex", "unknown");

//        if ($request->has("name")){
//            echo $request->input("name");
//        }else{
//            echo "not get parameter";
//        }

//        $res = $request->all();
//        dd($res);

        // 2, 判斷請求類型
//        echo $request -> method();

//        if ($request->isMethod("Get")) {
//            echo "Yes";
//        } else {
//            echo "No";
//        }

//        $res = $request->ajax();
//        var_dump($res);

//        $res = $request-> is("student/*");
//        var_dump($res);

        echo $request->url();
    }

    public function session(Request $request)
    {
        // 1 http request session
//        $request->session()->put("key1", "val1");
//       echo $request->session()->get("key1");


        // 2 session()

//        session()->put("key2", "val2");
//        echo session()->get("key2");

        // 3 Session
//        Session::put("key3", "val3");
//        echo Session::get("key3");
//        echo Session::get("key4", "default");

        // put array in session
//        Session::put(["key4" => "val4"]);

        // put data in session array
//        Session::push("student", "cc");
//        Session::push("student", "aa");
//        $res = Session::get("student");
//        var_dump($res);

        // get data from session than delete
//        $res = Session::pull("student");
//        var_dump($res);

        // get all session value
//        $res = Session::all();
//        dd($res);

        // has key in session
//        if (Session::has("key11")) {
//            $res = Session::all();
//            dd($res);
//        }else{
//            echo "not key 11";
//        }


        // using key remove session
//        Session::forget("key1");

        // clear all session
//        Session::flush();

        // temp session , only one time get
        Session::flash("key-flash", "val-flash");
    }

    public function session2(Request $request)
    {
       return Session::get("msg", "not data");
//        echo Session::get("key-flash");
    }

    public function response()
    {
        // return data to json
//        $data = [
//            "errCode" => 0,
//            "errMsg" => "success",
//            "data" => "cash"
//        ];
//
//        return response()->json($data);

        // redirect
//        return redirect("session2");

        // redirect and pass temp data (temp session, only one time get)
//        return redirect("session2")->with("msg", "temp data");

        // redirect using action
//       return redirect() ->action("StudentController@session2")->with("msg", "temp data");

        // redirect using route
//        return redirect()->route("s2")->with("msg", "temp data");

        // redirect using back
        return redirect()->back();
    }
}