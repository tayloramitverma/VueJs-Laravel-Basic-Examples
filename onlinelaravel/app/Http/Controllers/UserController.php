<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $data["view_name"] = "User/add_user";
        $data["title"] = "Add User";
        return View("template",$data);
    	//return View("User.add_user",array("name"=>"Taylor"));
    }
    public function add_user()
    {
        
    }
    public function list_user()
    {
        $data["view_name"] = "User/list_user";
        $data["title"] = "List User";
    	//$users = DB::table("usermaster")->get();
        $data["users"] = DB::select("SELECT * FROM usermaster");
    	/*echo "<pre>"; print_r((array)$users); echo "</pre>";
        die();*/
    	return View("template",$data);
    }
}