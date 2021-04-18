<?php

namespace App\Http\Controllers;

use Auth;
use App\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Hello Amit !!';
        $data['content_home'] = 'Start Bootstrap !';
        $data["list_blogs"] = Blog::orderBy("id","DESC")->simplePaginate(5);
        return View('blog', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Hello Amit !!';
        $data['content_home'] = 'Start Bootstrap !';
        return View('create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $request->validate(["blog_title"=>"required|unique:blogs"]);

        $request->validate([

            'blog_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $blog = new Blog;
        $blog->blog_title = Input::get("blog_title");
        $blog->blog_content = Input::get("blog_content");

        $imageName = time().'.'.$request->blog_image->getClientOriginalExtension();

        $request->blog_image->move(public_path('images'), $imageName);


        $blog->blog_image = $imageName;

        if(Auth::user()->id){
            $blog->user_id = Auth::user()->id;
        }

        if($blog->save())
            $request->session()->flash("insert_success","Item Added");
        else
            $request->session()->flash("insert_success","A database Error Has Occurred");

        return redirect("/add-blog");

        //$request->session()->flash("insert_success","Successful Insert");
        //$request->input("");

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog, $blog_id)
    {

        $data["item_blog"] = Blog::find($blog_id);
        $data['title'] = 'Hello Amit !!';
        $data['content_home'] = 'Start Bootstrap !';
        return View('view', $data);
        //Input::all();
        //Input::get("");

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog, $blog_id)
    {
        $data["item_blog"] = Blog::find($blog_id);
        $data['title'] = 'Hello Amit !!';
        $data['content_home'] = 'Start Bootstrap !';
        return View('edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate(["blog_title"=>"required"]);

        $request->validate([

            'blog_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $blog = Blog::find(Input::get("id"));
        $blog->blog_title = Input::get("blog_title");
        $blog->blog_content = Input::get("blog_content");

        $imageName = time().'.'.$request->blog_image->getClientOriginalExtension();

        $request->blog_image->move(public_path('images'), $imageName);

        $blog->blog_image = $imageName;


        if($blog->save()){
            $request->session()->flash('update_success', 'Blog successfully updated..!!');
        }else{
            $request->session()->flash('update_success', 'There is somthing wrong..!!');
        }

        return redirect('/update/'.Input::get("id"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
