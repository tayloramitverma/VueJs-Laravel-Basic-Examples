<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Models\Site;

class SiteController extends Controller
{
    public function index()
    {
    	$data["view_name"] = "Site/add_site";
    	$data["title"] = "Add Site";
    	return View("template",$data);
    }
    public function list_site()
    {
    	$data["list_site"] = DB::select("SELECT * FROM `sitemaster` ORDER BY `smid` DESC");
    	$data["view_name"] = "Site/list_site";
    	$data["title"] = "List Site";
    	return View("template",$data);
    }
    public function edit_site($id)
    {
        $data["site_data"] = DB::select("SELECT * FROM `sitemaster` WHERE `smid`=?",[$id]);
        $data["view_name"] = "Site/edit_site";
        $data["title"] = "Edit Site";
        return View("template",$data);
    }
    public function update_site(Request $request)
    {
        $request->input();
        $update_query = DB::table("sitemaster")->where("smid",$request->input("update_id"))->update(["sitemaster"=>$request->input("site_name"),"address"=>$request->input("site_address")]);

        if($update_query)
            $request->session()->flash("update_success","Site Updated");
        else
            $request->session()->flash("db_error","A Database Error Has Occurred");

        return redirect("/Site/list_site");
    }
    public function add_site(Request $request)
    {
        $site_data = DB::table("sitemaster")->insert(["sitemaster"=>$request->input("site_name"),"address"=>"site_address"]);

        if($site_data)
            $request->session()->flash("insert_success","Site Added");
        else
            $request->session()->flash("db_error","A Database Error Has Occurred");

        return redirect("Site/list_site");
    }
    public function delete_site(Request $request,$id)
    {
        $delete_query = DB::table("sitemaster")->where("smid","=",$id)->delete();

        if($delete_query)
            $request->session()->flash("delete_success","Site Deleted");
        else
            $request->session()->flash("db_error","A Database Error Has Occurred");

        return redirect("/Site/list_site");
    }
    public function fetch_all_site(Request $request)
    {
        if($request->ajax())
        {
            $site_param = Input::get("q");
            $sites = Site::where("sitemaster","like","%".$site_param."%")->get();

            foreach($sites as $site)
            {
                $arr["results"][] = array("id"=>$site->smid,"text"=>$site->sitemaster." (".$site->address.")");
            }
            echo json_encode($arr);            
        }
        else
        {
            return redirect("/dashboard");
        }
    }
}