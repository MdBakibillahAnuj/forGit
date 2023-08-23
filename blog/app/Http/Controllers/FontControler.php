<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class FontControler extends Controller
{
    public function viewBlog(){
        $search = request()->query('search');
        if ($search){
            $blog = Blog::where('title', 'LIKE', "%$search%")->orWhere('blog_content', 'LIKE', "%$search%")->simplepaginate(3);
        }else{
            $blog = Blog::orderBy('id', 'DESC')->simplepaginate(6);
        }
        return view('font.blog_view')
            ->with('blog', Blog::all())
//            ->with('tags', Tag::all())
            ->with('blog', $blog);



//        $blog=Blog::orderBy('id', 'DESC')->paginate(6);
//        return view('font.blog_view',compact('blog'));
    }
}
