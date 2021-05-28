<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Peopl;

class PeoplController extends Controller
{
    public function index()
    {
        $people = Peopl::all();

        return view('people.index', compact('people'));
    }

    public function create()
    {
        $peopl = new Peopl();
        return view('people.create', compact('peopl'));
    }

    public function store()
    {
        $people = Peopl::create($this->validateData());
        return redirect('/people/'.$people->id);
    }

    //Route Model Binding => \App\Customer $var
    public function show(Peopl $peopl)
    {
        return view('people.show', compact('peopl'));
    }

    public function edit(Peopl $peopl)
    {
        return view('people.edit', compact('peopl'));
    }

    public function update(Peopl $peopl)
    {
        $peopl->update($this->validateData());    

        return redirect('/people/'.$people->id);
    }

    public function destroy(Peopl $peopl)
    {
        $peopl->delete();

        return redirect('/people');
    }


    public function validateData()
    {
        return request()->validate([
			'cin' => 'required|max:8|',

			'fname' => 'required|max:191|',

			'lname' => 'required|max:191|',

			'email' => 'required|max:191|',

			'phone' => 'required|max:191|',

			'fonction' => 'required|max:191|',

			'login' => 'required|max:191|',

			'password' => 'required|max:191|',
		]);
 }


    //----------------------------------------Rest Controllers----------------------
    
    public function restIndex($limit = 0)
    {
        return Peopl::limit(99)->offset($limit)->get();
    }

    public function restStore()
    {
        return Peopl::create($this->validateData());
    }

    //Route Model Binding => \App\Customer $var
    public function restShow(Peopl $peopl)
    {
        return $peopl;
    }

    
    public function restUpdate(Peopl $peopl)
    {
        return $peopl->update($this->validateData());
    }

    public function RestDestroy(Peopl $peopl)
    {
        return $peopl->delete();
    }
}
        