<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
    	$data["view_name"] = "Item/add_item";
    	$data["title"] = "Add Item";

    	return View("template",$data);
    }
    public function add_item(request $request)
    {
    	$this->validate($request,["item_category"=>"required"]);

    	$item = new Item;
    	$item->itemname = Input::get("item_name");
    	$item->item_category = Input::get("item_category");

    	if($item->save())
    		$request->session()->flash("insert_success","Item Added");
    	else
    		$request->session()->flash("db_error","A database Error Has Occurred");

    	return redirect("Item/list_item");
    }
    public function list_item()
    {
    	$data["list_item"] = Item::orderBy("imid","DESC")->paginate(20);
    	$data["view_name"] = "Item/list_item";
    	$data["title"] = "Item List";
    	return View("template",$data);
    }
    public function edit_item(Request $request,$id)
    {
    	$data["item_data"] = Item::find($id);
    	$data["view_name"] = "Item/edit_item";
    	$data["title"] = "Edit Item";
    	return View("template",$data);
    }
    public function update_item(Request $request)
    {
    	$this->validate($request,["item_category"=>"required"]);
    	$item = Item::find(Input::get("update_id"));
    	$item->item_category = Input::get("item_category");
    	$item->itemname = Input::get("item_name");

    	if($item->save())
    		$request->session()->flash("update_success","Item Updated");
    	else
    		$request->session()->flash("db_error","A Database Error Has Occurred");

    	return redirect("/Item/list_item");
    }
    public function delete_item(Request $request,$id)
    {
    	$item = Item::find($id);
    	if($item->delete())
    		$request->session()->flash("delete_success","Item Deleted");
    	else
    		$request->session()->flash("db_error","A Database Error Has Occurred");

    	return redirect("/Item/list_item");
    }
    public function get_all_materials(Request $request)
    {
        if($request->ajax())
        {
            $item_param = Input::get("q");
            $items = Item::where("item_category","like","%".$item_param."%")->get();

            foreach($items as $item)
            {
                $arr["results"][] = array("id"=>$item->imid,"text"=>$item->item_category." ".$item->itemname);
            }

            echo json_encode($arr);
        }
        else
        {
            redirect("/dashboard");
        }
    }
}