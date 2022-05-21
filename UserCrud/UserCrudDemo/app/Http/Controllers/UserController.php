<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $users = User::all();
        return view('user.index', [
            'users' => $users,
       

        ]);
    }

    public function create()
    {

        return view('user.register');
    }

    public function store(Request $request)
    {
        $attributes = request()->validate([
            'name' => 'required|min:2',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:4',
            'date_of_birth' => 'required',
          //  'profile_image' => 'image|mimes:jpeg,png,jpg|max:2048'

        ]);
    
        $attributes = $request->all();
        // if ($profile_image = $request->File('profile_image')) {
        //     $destination_path = 'public/images';
        //     $image = $request->file('profile_image');
        //     $image_name = date('YmdHis') . "." . $profile_image->getClientOriginalExtension();
        //     $path = $request->file('profile_image')->storeAs($destination_path, $image_name);
        //     $attributes['profile_image'] = $image_name;
        // }


        // dd($attributes);
        User::create($attributes);
        return redirect('/')->with('success', 'User Added successfully');
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        // $roles = Role::all();
        return view('user.update', compact('user'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $user = User::findOrFail($id);
        // return $user;
        $request->validate([
            'name' => 'required|min:2',
            'email' => 'required|email|unique:users,email,' . $user->id,
            //  'role' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required'

        ]);
        $attributes = $request->all();
        // if ($profile_image = $request->File('profile_image')) {
        //     $destination_path = 'public/images';
        //     $image = $request->file('profile_image');
        //     $image_name = date('YmdHis') . "." . $profile_image->getClientOriginalExtension();
        //     $path = $request->file('profile_image')->storeAs($destination_path, $image_name);
        //     $attributes['profile_image'] = $image_name;
        // }
        $user->update($attributes);

        return redirect('/')->with('success', 'Record updated Successfully');
    }



    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/')->with('success', 'User deleted Successfully');
    }
}
