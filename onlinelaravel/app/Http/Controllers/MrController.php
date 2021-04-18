<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Models\Site;
use App\Models\Materialrequest;
class MrController extends Controller
{
    public function index()
    {
    	$data["sites"] = Site::all();
    	$data["view_name"] = "Mr/add_mr";
    	$data["title"] = "Add MR";
    	return View("template",$data);
    }
    public function add_mr(Request $request)
    {
        //dd(Input::all());
        $values = Input::all();
        $mr_data = new Materialrequest;
        $mr_data->smid = $values["site_id"];
        $mr_data->requestdatetime = date("Y-m-d H:i:s");

        $mr_details = array();
        for($i=0;$i<count($values["item_name"]);$i++)
        {
            $mr_details[] = array("imid"=>$values["item_name"][$i],
                                  "muid"=>$values["material_unit"][$i],
                                  "unit_price"=>$values["unit_price"][$i],
                                  "qty"=>$values["quantity"][$i],
                                  "remarks"=>$values["remarks"][$i]
                                  );
        }

        DB::beginTransaction();
            $mr_data_ins = $mr_data->save();
            $mr_data = Materialrequest::find($mr_data->mrmid);
            $mr_details = $mr_data->materialrequestdetails()->createMany($mr_details);

            if($mr_data_ins && $mr_details)
            {
                DB::commit();
                $request->session()->flash("insert_success","MR Created");
            }
            else
            {
                DB::rollback();
                $request->session()->flash("db_error","A Database Error Has Occurred");
            }

            return redirect("/Mr/list_mr");
    }
    public function list_mr(request $request)
    {
        $data["list_mr"] = Materialrequest::orderBy("mrmid","DESC")->paginate(20);
        $data["view_name"] = "Mr/list_mr";
        $data["title"] = "List MR";
        return View("template",$data);
    }
    public function edit_mr(Request $request,$id)
    {
        $data["mr_data"] = Materialrequest::find($id);
        $data["view_name"] = "Mr/edit_mr";
        $data["title"] = "Edit MR";
        return View("template",$data);
    }
    public function update_mr(Request $request)
    {
        DB::transaction(function() use($request){
            $values = $request->post();

            $mr_data = Materialrequest::find($values["update_id"]);

            //$mr_details = $mr_data->materialrequestdetails;

            for($i=0;$i<count($values["item_name"]);$i++)
            {
                $mr_detail = $mr_data->materialrequestdetails->find($values["mr_detail_id"][$i]);
                if($mr_detail)
                {
                    $mr_detail->imid = $values["item_name"][$i];
                    $mr_detail->muid = $values["material_unit"][$i];
                    $mr_detail->qty = $values["quantity"][$i];
                    $mr_detail->unit_price = $values["unit_price"][$i];
                    $mr_detail->remarks = $values["remarks"][$i];

                    $mr_detail->save();
                }
            }
        });
        return redirect("/Mr/list_mr");
    }
    public function delete_mr(Request $request,$id)
    {
        DB::transaction(function() use($id){
            Materialrequest::find($id)->materialrequestdetails()->delete();
            Materialrequest::destroy($id);
        });

        return redirect("/Mr/list_mr");
    }
}