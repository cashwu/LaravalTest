<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::group(["middleware" => ["web"]], function () {

    Route::get("/", ["uses" => "StudentController@index"]);
    Route::any("/create", ["uses" => "StudentController@create"]);
    Route::any("/save", ["uses" => "StudentController@save"]);
    Route::any("/update/{id}", ["uses" => "StudentController@update"]);
    Route::any("/detail/{id}", ["uses" => "StudentController@detail"]);
    Route::any("/delete/{id}", ["uses" => "StudentController@delete"]);
});



//Route::get('/', function () {
//    return view('welcome');
//});

// 基礎路由
Route::get('basic1', function () {
    return "Hello World";
});

Route::get('basic3', function () {
    return "Hello World 33";
});

// 需在 VerifyCsrfToken 設置排除路由
Route::post('basic2', function () {
    return "basic 2";
});

// 多請求路由
// 限定 get , post
Route::match(['get', 'post'], 'match', function () {
    return "match";
});

// 任何
Route::any('any', function () {
    return "any";
});


// 路由參數
//Route::get('user/{id}', function ($id) {
//    return "User - id - " . $id;
//});

// 參數可為空
//Route::get('user/{name?}', function ($name = null) {
//    return "User - name - " . $name;
//});

// 參數有預設值
//Route::get('user/{name?}', function ($name = "cash") {
//   return "User - name - " . $name; 
//});

// 使用正則表達式來限定參數
//Route::get('user/{name?}', function ($name = "cash") {
//   return "User - name - " . $name; 
//})->where("name", "[A-Za-z]+");

// 多參數
//Route::get('user/{id}/{name?}', function ($id, $name = "cash") {
//   return "User - id - " . $id . " - name - " . $name; 
//})->where(["id" => "[0-9]+", "name" => "[A-Za-z]+"]);

// 路由別名
//Route::get('user/member', ["as" => "center" ,function () {
//   return "member url - " . route("center"); 
//}]); 

// 路由群組
Route::group(['prefix' => 'member'], function () {

    Route::get('center', ["as" => "center", function () {
        return "member url - " . route("center");
    }]);

    Route::get('admin', function () {
        return "admin";
    });
});

// 路由輸出 view
Route::get('view', function () {
    return view('welcome');
});


// route 關聯到 controller
//Route::get('member/info', "MemberController@info");

//Route::get('member/info', ["uses" => "MemberController@info"]);

// 可以使用 any 和 match
//Route::any('member/info', ["uses" => "MemberController@info"]);

//Route::get('member/info', [
//    "uses" => "MemberController@info",
//    "as" => "memberinfo"    
//]);

// 可以傳參數到 controller
//Route::any('member/{id}', ["uses" => "MemberController@info"]);

// 限制傳入的參數 
Route::any('member/{id}', ["uses" => "MemberController@info"])
    ->where("id", "[0-9]+");


Route::any('test1', ["uses" => "StudentOldController@test1"]);

Route::any('query', ["uses" => "StudentOldController@query"]);

Route::any('update', ["uses" => "StudentOldController@update"]);

Route::any('delete', ["uses" => "StudentOldController@delete"]);

Route::any('select', ["uses" => "StudentOldController@select"]);

Route::any('aggregate', ["uses" => "StudentOldController@aggregate"]);

Route::any('orm', ["uses" => "StudentOldController@orm"]);

Route::any('ormCreate', ["uses" => "StudentOldController@ormCreate"]);

Route::any('ormUpdate', ["uses" => "StudentOldController@ormUpdate"]);

Route::any('ormDelete', ["uses" => "StudentOldController@ormDelete"]);

Route::any('section', ["uses" => "StudentOldController@section"]);

Route::any('url', ["as" => "urlT", "uses" => "StudentOldController@url"]);

Route::any('student/request', ["uses" => "StudentOldController@request"]);

Route::group(["middleware" => ["web"]], function () {

    Route::any('session', ["uses" => "StudentOldController@session"]);

    Route::any('session2', ["as" => "s2", "uses" => "StudentOldController@session2"]);

});

Route::any('response', ["uses" => "StudentOldController@response"]);

// coming soon page
Route::any('activity', ["uses" => "StudentOldController@activity"]);

// activity page
Route::group(["middleware" => ["activity"]], function () {

    Route::any('activityIng', ["uses" => "StudentOldController@activityIng"]);

    Route::any('activityEnd', ["uses" => "StudentOldController@activityEnd"]);
});
