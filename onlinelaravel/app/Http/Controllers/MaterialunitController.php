<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Models\Materialunit;

class MaterialunitController extends Controller
{
    public function index()
    {
    	$data["view_name"] = "Materialunit/add_material_unit";
    	$data["title"] = "Add Material Unit";
       	return View("template",$data);
    }
    public function add_material_unit(Request $request)
    {
        $this->validate($request,["muname"=>"required"]);
        $mu = new Materialunit;
        $mu->muname = Input::get("muname");
        $mu->mufullname = Input::get("mufullname");

        if($mu->save())
            $request->session()->flash("insert_success","Material Unit Added");
        else
            $request->session()->flash("db_error","A Database Error Has Occurred");

        return redirect("/Materialunit/list_material_unit");
    }
    public function edit_material_unit(Request $request,$id)
    {
        $data["material_unit_data"] = Materialunit::find($id);
        $data["view_name"] = "Materialunit/edit_material_unit";
        $data["title"] = "Edit Material Unit";
        return View("template",$data);
    }
    public function update_material_unit(Request $request)
    {
        $this->validate($request,["muname"=>"required"]);
        $mu = Materialunit::find(Input::get("update_id"));
        $mu->muname = Input::get("muname");
        $mu->mufullname = Input::get("mufullname");

        if($mu->save())
            $request->session()->flash("update_success","Material Unit Added");
        else
            $request->session()->flash("db_error","A Database Error Has Occurred");

        return redirect("/Materialunit/list_material_unit");
    }
    public function list_material_unit(Request $request)
    {
        $data["list_material_unit"] = Materialunit::orderBy("muid","DESC")->get();
        $data["view_name"] = "Materialunit/list_material_unit";
        $data["title"] = "List Material Unit";
        return View("template",$data);
    }
    public function delete_material_unit(Request $request,$id)
    {
        $mu = Materialunit::find($id);
        if($mu->delete())
            $request->session()->flash("delete_success","Material Unit Deleted");
        else
            $request->session()->flash("db_error","A Database Error Has Occurred");

        return redirect("/Materialunit/list_material_unit");
    }
    public function get_all_materialunits(Request $request)
    {
        if($request->ajax())
        {
            $mu_param = Input::get("q");
            $material_units = Materialunit::where("mufullname","like","%".$mu_param."%")->get();

            foreach($material_units as $mu)
            {
                $arr["results"][] = array("id"=>$mu->muid,"text"=>$mu->mufullname." (".$mu->muname.")");
            }
            echo json_encode($arr);
        }
        else
        {
            return redirect("/dashboard");
        }
    }
}