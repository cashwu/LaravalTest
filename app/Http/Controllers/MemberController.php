<?php

namespace App\Http\Controllers;

use App\Member;

class MemberController extends Controller
{
    public function info($id)
    {
        // 使用 Model
        return Member::getMember();

        // 使用 blade 
        //return View("member/info", [
        //    "name" => "cash"
        //]);

        // 使用傳統的 php
        //return View("member/memberInfo");

        // controller
        //return "member id - " . $id;
        //return "member url - " . route("memberinfo"); 
        //return "member-info";
    }
}

?>