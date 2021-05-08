<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use PharIo\Manifest\Email;

class UserController extends Controller
{
    function login(Request $req)
    {
        $user= User::where(['email'=>$req->email])->first();
        if(!$user || Hash::Check($req->email,$user->password))
        {
            return "username or password is not matched";
        }
        else
        {
            $req->session()->put('user',$user);
            return redirect('/');
        }
    }
    function register(Request $req)
    {
        //return $req->input(); #to find the send data
        $user=new User;
        $user->name=$req->name;
        $user->email=$req->email;
        $user->password=Hash::make($req->password); # hash is used to make password encrypt
        $user->save();
        return redirect('/login');
    }
}
