<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Str;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($route="posts")
    {
        return view($route,["posts"=>Post::all(),"categories"=>Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $data =$request->all() ;

        if($request->hasFile('post_image')) {
            $data['post_image'] = $request->file('post_image')->store('postImages',"public");
        } else {
            $data['post_image'] = "hello";
        }
//        dd($data['post_image']);
        $data["slug"] = Str::slug($data["post_title"],"_");
        $data["user_id"] = 21;
        Post::create($data);
        return redirect("/posts");
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        return view("postDetails",[
            "postDetails"=>Post::where("slug",$slug)->get()[0]   ,
            "comments"=>Comment::all()
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }


    public function archive($id){
        Post::where("id",$id)->update(["isArchived"=>1]);
        return redirect("/posts");
    }


    public function restore($id){
        Post::where("id",$id)->update(["isArchived"=>0]);
        return redirect("/posts");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
