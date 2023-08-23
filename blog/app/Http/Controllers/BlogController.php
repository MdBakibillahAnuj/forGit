<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function viewBlog(){
        $blog=Blog::orderBy('id', 'DESC')->get();
        return view('back.blog_view',compact('blog'));
    }

    public function addBlog(){
        return view('back.add_blog');
    }

    public function storeBlog(Request $request){

        $validated = $request->validate([
            'title'=> 'required',
            'blog_content'=> 'required',
        ]);

        $data=new Blog();

        $data->user_id      =$request->user_id;
        $data->title       =$request->title;
        $data->blog_content        =$request->blog_content;

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').'.'.$file->getClientOriginalExtension();
            $file-> move(public_path('/'), $filename);
            $data['image']= $filename;
        }
        $data->save();
        return redirect()->back();

    }

    public function editBlog($id){
        $blog=Blog::find($id);
        return view('back.edit_blog',compact('blog'));
    }
    public function updateBlog(Request $request,$id)
    {

        $data=Blog::find($id);
        $data->user_id      =$request->user_id;
        $data->title       =$request->title;
        $data->blog_content        =$request->blog_content;
        $img = $data->image;

        if($request->file('image')){
            $file= $request->file('image');
            @unlink($img);
            $filename= date('YmdHi').'.'.$file->getClientOriginalExtension();
            $file-> move(public_path('/'), $filename);
            $data['image']= $filename;
        }
        $data->update();

        return redirect()->back();

    }
    public function deleteBlog($id){
        $blog = Blog::find($id);
        @unlink(public_path('/' .$blog->image));
        $blog->delete();

        return redirect()->back();
    }
}
