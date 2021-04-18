<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
class CategoryController extends Controller
{
    public function index()
    {
    	$data["view_name"] = "Category/add_category";
    	$data["title"] = "Add Category";
    	return View("template",$data);
    }
    public function list_category()
    {
        $data["list_category"] = Category::orderBy("cmid","DESC")->get();
    	$data["view_name"] = "Category/list_category";
    	$data["title"] = "Category List";
    	return View("template",$data);
    }
    public function edit_category($id)
    {
        $data["category_data"] = Category::find($id);
        $data["view_name"] = "Category/edit_category";
        $data["title"] = "Edit Category";
        return View("template",$data);
    }
    public function add_category(Request $request)
    {
        //dd($request->input()); die();
        $validateErrors = $this->validate($request,["categoryname"=>"required|unique:categorymaster,categoryname"]);
        $category_data = DB::table("categorymaster")->insert(["categoryname"=>$request->input("categoryname"),"category_image"=>"","created"=>date("Y-m-d")]);

        if($category_data)
            $request->session()->flash("insert_success","Category Added");
        else
            $request->session()->flash("db_error","A Database Error Has Occurred");

        return redirect("/Category/list_category");
    }
    public function update_category(Request $request)
    {
        $validateErrors = $this->validate($request,["categoryname"=>"required"]);
        $update_query = DB::table("categorymaster")->where("cmid",$request->input("update_id"))->update(["categoryname"=>$request->input("categoryname")]);

        if($update_query)
            $request->session()->flash("update_success","Category Updated");
        else
            $request->session()->flash("db_error","A Database Error Has Occurred");

        return redirect("/Category/list_category");
    }
    public function delete_category(Request $request,$id)
    {
        $category = Category::find($id);

        if($category->delete())
            $request->session()->flash("delete_success","Category Deleted");
        else
            $request->session()->flash("db_error","A Database Error Has Occurred");

        return redirect("/Category/list_category");
    }
}