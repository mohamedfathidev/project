<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;

class UserController extends Controller
{
    public function user(){
        $users=User::where('is_admin','=',0)->orderBy('users.id','desc')->paginate(7);
        return view('dashboard.users.list',compact('users'));
    }
    public function showForm(){
        return view('dashboard.users.add');
    }
    public function add(Request $request){
        
        $validatedData=$request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|string|min:6'
        ]);

    
        
        $userData= new User();
        $userData->name=$request->name;
        $userData->email=$request->email;
        $password=Hash::make($validatedData['password']);
        $userData->password=$password;
        $userData->remember_token=Str::random(35);
        $userData->save();

        
        return redirect()->back()->with('success','User '.$userData->name.' Added Successfully');
    }
    public function showEdit($id){
        $user=User::where('id',$id)->first();
        return view('dashboard.users.edit',compact('user'));
    }
    public function edit(Request $request , $id){

        $validatedData=$request->validate([
            'name'=>'string|max:255',
            'email'=>'email|unique:users,email,'.$id,
            'password'=>'string|min:6'
        ]);

        $user=User::where('id',$id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password
        ]);
        if($user){
            return redirect('dashboard/users')->with('success','User Data Updated Carefully');
        }




    }
    public function destory($id){
        
        User::where('id',$id)->delete();
        return redirect()->route('dashboard.users')->with('success','User Deleted Successfully!');
    }

}
