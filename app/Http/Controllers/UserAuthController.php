<?php
/**
 * Created by PhpStorm.
 * User: cash
 * Date: 2018/02/12
 * Time: 17:22
 */

namespace App\Http\Controllers;

use App\Entity\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Validator;

class UserAuthController extends Controller
{
    public function signUpGet()
    {
        $model = ["title" => "註冊"];

        return view("auth.signUp", $model);
    }

    public function signUpPost()
    {
        $input = request()->all();

        $rules = [
            "nickname" => ["required", "max:50"],
            "email" => ["required", "max:150", "email"],
            "password" => ["required", "same:passwordconfirm", "min:6"],
            "passwordconfirm" => ["required", "min:6"],
            "type" => ["required", "in:G,A"],
        ];

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
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

    public function signInGet()
    {
        $model = [
            "title" => "Login"
        ];

        return view("auth.signIn", $model);
    }

    public function signInPost()
    {
        $input = request()->all();

        $rules = [
            "email" => ["required", "max:150", "email"],
            "password" => ["required", "min:6"]
        ];

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {

            return redirect("/user/auth/signIn")->withErrors($validator)->withInput();
        }

//        DB::enableQueryLog();

        $user = User::where("email", $input["email"])->firstOrFail();

//        var_dump(DB::getQueryLog());

        $isPasswordCorrect = Hash::check($input["password"], $user->password);

        if (!$isPasswordCorrect) {
            $errorMsg = [
                "msg" => ["login filed"]
            ];

            return redirect("/user/auth/signIn")->withErrors($errorMsg)->withInput();
        }

        session()->put("user_id", $user -> id);

        return redirect()->intended("/");
    }

    public function signOut()
    {
        session()->forget("user_id");
        return redirect("/");
    }
}