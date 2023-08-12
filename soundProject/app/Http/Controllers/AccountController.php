<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class AccountController extends Controller
{
    //___________ Registration in Layout _____________
    public function Register(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'reg_username' => 'required|string|max:255',
            'reg_email' => 'required|email|unique:users,email',
            'reg_password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json(['errors' => $errors], 422);
        }

        $user = new User();
        $user->username = $req->reg_username;
        $user->email = $req->reg_email;
        $user->password = Hash::make($req->reg_password);
        $user->role = 2;
        $user->save();

        $req->Session()->put('user', $user);

        return response()->json(['message' => 'User registered successfully'], 200);
    }

    //___________ Login in Layout _____________
    public function Login(Request $req)
    {
        // $validator = $req->validate([
        //     'email' => 'required|email',
        //     'password' => 'required',
        // ]);

        //_____________ 1st Way _________
        // $user = User::Where('username',$req->usernmae,'password',$req->password)->first();
        // if(!$user){
        //     return Redirect()->rounte("loginAccount");
        // }
        // $req->Session()->put('user',$user);
        // return Redirect()->rounte("home");

        //_____________ 2nd Way _________
        $validator = Validator::make($req->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }


        $user= User::Where(['email'=>$req->email])->first();

        if ($user) {
            if($user->password == Hash::make($req->password)){
                $req->Session()->put('user', $user);
                // if ($user->role === 1) {
                //     return redirect()->route('dashboard.index');
                // } elseif ($user->role === 2) {
                //     return redirect('/');
                // } elseif ($user->role === 3) {
                //     return redirect()->route('employee.dashboard');
                // }
                return response()->json(['role' => $user->role], 200);
            }

        }
        else {
            // Invalid credentials, return JSON response with error message
            return response()->json(['error' => 'Invalid credentials'], 422);
        }
    }

    //___________ Login in Layout _____________
    public function Logout(Request $req)
    {
        Session::forget('user');
        return redirect('/');
    }

}
