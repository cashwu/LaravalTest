<?php

namespace App\Http\Controllers;

class MemberController extends Controller
{
    public function info($id)
    {
        return "member id - " . $id;
        //return "member url - " . route("memberinfo"); 
        //return "member-info";
    }
}

?>