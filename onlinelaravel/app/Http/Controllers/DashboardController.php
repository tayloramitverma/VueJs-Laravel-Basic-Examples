<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
		$data["view_name"] = "dashboard";
		$data["title"] = "Dashboard";
		return View("template",$data);
    }
}
