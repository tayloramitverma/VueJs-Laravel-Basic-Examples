<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Vendor;
use App\Models\Site;
class VendorController extends Controller
{
    public function index()
    {
    	$data["view_name"] = "/Vendor/add_vendor";
    	$data["title"] = "Add Vendor";
    	return View("template",$data);
    }
    public function add_vendor(Request $request)
    {
        $vendor = new Vendor;
        $vendor->vname = $request->vname;
        $vendor->vaddress = $request->vaddress;
        $vendor->vmobileno = "";
        $vendor->valtmobileno = "";
        $vendor->email_id = "";
        $vendor->gstno = "";
        $vendor->description = "";

    	if($vendor->save())
    		$request->session()->flash("insert_success","Vendor Added");
    	else
    		$request->session()->flash("db_error","A Database Error Has Occurred");

    	return redirect("/Vendor/list_vendor");
    }
    public function list_vendor()
    {
        $data["list_vendor"] = Vendor::orderBy("vid","DESC")->get();
    	$data["view_name"] = "Vendor/list_vendor";
    	$data["title"] = "List Vendor";
    	return View("template",$data);
    }
    public function edit_vendor(Request $request,$id)
    {
        $data["vendor_data"] = Vendor::find($id);
    	$data["view_name"] = "Vendor/edit_vendor";
    	$data["title"] = "Edit Vendor";
    	return View("template",$data);
    	//dd($data); die();
    }
    public function update_vendor(Request $request)
    {
        $vendor = Vendor::find($request->update_id);
        $vendor->vname = $request->vname;
        $vendor->vaddress = $request->vaddress;

    	if($vendor->save())
    		$request->session()->flash("update_success","Vendor Updated");
    	else
    		$request->session()->flash("db_error","A Database Error Has Occurred");

    	return redirect("/Vendor/list_vendor");
    }
    public function delete_vendor(Request $request,$id)
    {
        $vendor = Vendor::find($id);

        if($vendor->delete())
            $request->session()->flash("delete_success","Vendor Deleted");
        else
            $request->session()->flash("db_error","A Database error has Occurred");

        return redirect("/Vendor/list_vendor");
    }
    public function assign_site(Request $request,$id)
    {
        $data["sites"] = Site::all();
        $data["vendor"] = Vendor::find($id);
        $data["view_name"] = "Vendor/assign_site";
        $data["title"] = "Assign Site";
        return View("template",$data);
    }
    public function do_site_assign(Request $request)
    {
        $values = $request->input();

        $vendor = Vendor::find($values["vendor_id"]);
        
        if($vendor->sites()->sync($values["assigned_site"]))
            $request->session()->flash("success","Site Assignment Successful");
        else
            $request->session()->flash("db_error","A Database error has occurred");

        return redirect("Vendor/list_vendor");
    }
}