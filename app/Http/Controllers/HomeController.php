<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('home');
    }

    public function blogs(){

        $blogs=Blog::paginate(3);
        return view('blog',compact('blogs'));
    }
    public function blogsDetails($id){
        $blog=Blog::where('id',$id)->first();
        $tags=explode(',',$blog->tags);
        return view('blog-details',compact('blog','tags'));
    }


}
