<?php
/**
 * Created by PhpStorm.
 * User: cash
 * Date: 2018/02/12
 * Time: 17:22
 */

namespace App\Http\Controllers;

use App\Entity\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Validator;

class UserAuthController extends Controller
{
    public function signUpGet()
    {
       $model = [ "title" => "註冊"] ;

       return view("auth.signUp", $model);
    }

    public function signUpPost()
    {
       $input = request() ->all();

       $rules = [
           "nickname" => ["required", "max:50"],
           "email" => ["required", "max:150", "email"],
           "password" => ["required", "same:passwordconfirm", "min:6"],
           "passwordconfirm" => ["required", "min:6"],
           "type" => ["required", "in:G,A"],
       ];

       $validator = Validator::make($input, $rules);

       if ($validator->fails()){
           return redirect("/user/auth/signUp")
               ->withErrors($validator)
               ->withInput();
       }

       $input["password"] = Hash::make($input["password"]);

       $user = User::create($input);

//       $mail_binding = [
//           "nickname" => $input["nickname"]
//       ];
//
//       Mail::send("email.signUpEmailNotification", $mail_binding,
//       function ($mail) use ($input){
//           $mail->to($input["email"]);
//           $mail->from("cc@cc.com");
//           $mail->subject("register success");
//       });

       return redirect("/user/auth/signUp");
    }
}