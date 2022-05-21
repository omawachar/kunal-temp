<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class RegisterController extends Controller
{
    public function create(){
        return view('register.create');
    }

    public function store(Request $request){

        $attributes =request()->validate([
            'name'=>'required|max:25|min:2',
            'email'=> 'required |email|unique:users,email',
            'password'=>'required | min:4'
        ]);
$user=User::create($attributes);
       auth()->login($user);
        return redirect('/')->with('message','Your Account has been created Successfully');
    }
}
