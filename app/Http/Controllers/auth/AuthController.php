<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

class AuthController extends Controller
{
    public function login_page(){
        return view('auth.login');
    }
    public function register_page(){
        return view('auth.register');
    }
    public function register(RegisterRequest $request){

        $data = User::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        auth()->loginUsingId($data->id);
        return redirect()->route('dashboard');
    }
    public function login(LoginRequest $request){
        if (auth()->attempt(['email' => $request->email,'password' => $request->password])) {
            return redirect()->route('dashboard');
        }
        else{
            return redirect()->route('login.page')->with('error','email or password error');

        }
    }
    public function logout()
    {
        auth()->logout();
        return redirect()->route('login.page');
    }
    public function dashboard(){
        return view('admin.index');
    }

}
