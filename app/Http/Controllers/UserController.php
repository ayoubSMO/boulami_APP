<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        $user = new User();
        return view('users.create', compact('user'));
    }

    public function store()
    {
        $users = User::create($this->validateData());
        return redirect('/users/'.$users->id);
    }

    //Route Model Binding => \App\Customer $var
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(User $user)
    {
        $user->update($this->validateData());    

        return redirect('/users/'.$users->id);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect('/users');
    }


    public function validateData()
    {
        return request()->validate([
			'id' => '',

			'name' => 'required|max:191|',

			'email' => 'required|max:191|',

			'email_verified_at' => '',

			'password' => 'required|max:191|',

			'remember_token' => 'max:100|',
		]);
 }


    //----------------------------------------Rest Controllers----------------------
    
    public function restIndex($limit = 0)
    {
        return User::limit(99)->offset($limit)->get();
    }

    public function restStore()
    {
        return User::create($this->validateData());
    }

    //Route Model Binding => \App\Customer $var
    public function restShow(User $user)
    {
        return $user;
    }

    
    public function restUpdate(User $user)
    {
        return $user->update($this->validateData());
    }

    public function RestDestroy(User $user)
    {
        return $user->delete();
    }
}
        