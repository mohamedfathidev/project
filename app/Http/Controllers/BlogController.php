<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{


    public function blogs(){
        $blogs=Blog::all();
        
        return view('dashboard.blogs.list',compact('blogs'));
    }


    
    public function showForm(){
           
        return view('dashboard.blogs.add');
    }
    public function add(Request $request){
        
        $validData=$request->validate([
            'title'=>'string:max:255',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:4000',
            'description'=>'required',
            'tags'=>'nullable|array',
            'author'=>'string',

        ]);

        if($request->hasFile('image')){
            $fileName=time().$request->file('image')->getClientOriginalName();
            $path=$request->file('image')->storeAs('images',$fileName,'public'); 
            $dbPath= '/storage/'.$path;
            
        }
        $post= new blog();
        $post->title=$request->title;
        $post->image=$dbPath;
        $post->description=$request->description;
        
        $post->author=$request->author;
        $post->author_des=$request->author_des;

        if(isset($validData['tags'])){
            $post->tags = implode(',', $validData['tags']);
        } else {
            $post->tags = null;
        }
        $post->save();


        return redirect()->route('dashboard.blogs')->with('success','Post has been stored Successfully!');

    }

    public function showEdit($id){
        $blog=Blog::where('id',$id)->first();
        return view('dashboard.blogs.edit',compact('blog'));
    }
    public function edit(Request $request , $id){

        $validData=$request->validate([
            'title'=>'string:max:255',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description'=>'required',
            'tags'=>'nullable|array',
            'author'=>'string',

        ]);
        if($request->hasFile('image')){
            $fileName=time().$request->file('image')->getClientOriginalName();
            $path=$request->file('image')->storeAs('images',$fileName,'public'); 
            $dbPath= '/storage/'.$path;
            
        }
        else {
            $dbPath=null;
        }
        

        $blog=Blog::where('id',$id)->update([
            'title'=>$request->title,
            'image'=>$dbPath,
            'description'=>$request->description,
            
            'author'=>$request->author,
            'author_des'=>$request->author_des,
        ]);
        if($blog){
            return redirect('dashboard/blogs')->with('success','User Data Updated Carefully');
        }




    }






    public function destory($id){
        
        Blog::where('id',$id)->delete();
        return redirect()->route('dashboard.blogs')->with('success','Blog Deleted Successfully!');
    }
}
