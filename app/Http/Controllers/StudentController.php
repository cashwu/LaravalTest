<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB; 

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

        $bool = DB::table('student') -> insert([
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
}

?>