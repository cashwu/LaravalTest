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
}

?>