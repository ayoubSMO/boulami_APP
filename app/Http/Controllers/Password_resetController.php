<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Password_reset;

class Password_resetController extends Controller
{
    public function index()
    {
        $password_resets = Password_reset::all();

        return view('password_resets.index', compact('password_resets'));
    }

    public function create()
    {
        $password_reset = new Password_reset();
        return view('password_resets.create', compact('password_reset'));
    }

    public function store()
    {
        $password_resets = Password_reset::create($this->validateData());
        return redirect('/password_resets/'.$password_resets->id);
    }

    //Route Model Binding => \App\Customer $var
    public function show(Password_reset $password_reset)
    {
        return view('password_resets.show', compact('password_reset'));
    }

    public function edit(Password_reset $password_reset)
    {
        return view('password_resets.edit', compact('password_reset'));
    }

    public function update(Password_reset $password_reset)
    {
        $password_reset->update($this->validateData());    

        return redirect('/password_resets/'.$password_reset->id);
    }

    public function destroy(Password_reset $password_reset)
    {
        $password_reset->delete();

        return redirect('/password_resets');
    }


    public function validateData()
    {
        return request()->validate([
			'email' => 'required|max:191|',

			'token' => 'required|max:191|',
		]);
 }


    //----------------------------------------Rest Controllers----------------------
    
    public function restIndex($limit = 0)
    {
        return Password_reset::limit(99)->offset($limit)->get();
    }

    public function restStore()
    {
        return Password_reset::create($this->validateData());
    }

    //Route Model Binding => \App\Customer $var
    public function restShow(Password_reset $password_reset)
    {
        return $password_reset;
    }

    
    public function restUpdate(Password_reset $password_reset)
    {
        return $password_reset->update($this->validateData());
    }

    public function RestDestroy(Password_reset $password_reset)
    {
        return $password_reset->delete();
    }
}
        