<?php

namespace App\Http\Controllers;



use App\Models\User;
use App\Mail\RegisterMail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function login(){
        return view('auth.login');
    }
    public function register(){
        return view('auth.register');

    }
    public function forgotPassword(){
        return view('auth.forgot-password');

    }
    public function createUser(Request $request)
    {
        $validatedData=$request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|string|min:6'
        ]);

    
        // dd($validatedData);
        $userData= new User();
        $userData->name=$request->name;
        $userData->email=$request->email;
        $password=Hash::make($validatedData['password']);
        $userData->password=$password;
        $userData->remember_token=Str::random(35);
        $userData->save();

        
        return redirect()->back()->with('success','You have registered Successfully');
    

    }

    /**
     * Show the form for creating a new resource.
     */
    public function checkLogin(Request $request)
{
    $validateData = $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:6|string'
    ]);

    $user = User::where('email', $request->email)->first();
    if ($user && Hash::check($request->password, $user->password)) {
        Auth::login($user);
        if ($user->is_admin == 1) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('home');
        }
    } else {
        return redirect()->back()->with('fail', 'Your password or email is not correct');
    }
}

public function logout()
{
    Auth::logout();
    return redirect()->route('login');
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }
}
