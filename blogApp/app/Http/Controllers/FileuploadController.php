<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fileupload;
use Illuminate\Support\Facades\Input;

class FileuploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

   
   		if($request->file('image')){


   			//$filedata = $request->file('image')->store('images', 'public');


   			$filedata = $request->file('image');
   			$path = public_path() . '/images/';
   			$newname = time().'.'.$filedata->getClientOriginalExtension();
  			$filedata->move($path, $newname);

	    	$fileupload = new Fileupload();
		    $fileupload->filename=$newname;
		    $fileupload->save();
	        
	    	return response()->json([
		        'status' => true,
		    	'message' => 'Image Successfully uploaded!',
		    	'data' => $newname
			]);

   		}
    	 
    	

        if($request->get('file'))
       	{

	          $image = $request->get('file');
	          $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
	          \Image::make($request->get('file'))->save(public_path('images/').$name);
	        
	        $fileupload = new Fileupload();
	        $fileupload->filename=$name;
	        $fileupload->save();

	        return response()->json([
	        	'status' => true,
	    		'message' => 'Image Successfully uploaded!',
	    		'data' => $name
			]);

	    }else{

	    	return response()->json([
	        	'status' => false,
	    		'message' => 'Error!',
	    		'data'=> ''
			]);
	    }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}