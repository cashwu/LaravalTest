<?php

namespace App\Http\Controllers;

class MemberController extends Controller
{
    public function info($id)
    {
        // blade 
        return View("member/info", [
            "name" => "cash"
        ]);

        // 對應傳統的 php
        //return View("member/memberInfo");

        // controller
        //return "member id - " . $id;
        //return "member url - " . route("memberinfo"); 
        //return "member-info";
    }
}

?>