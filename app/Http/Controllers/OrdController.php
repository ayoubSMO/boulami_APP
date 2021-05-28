<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Ord;

class OrdController extends Controller
{
    public function index()
    {
        $ords = Ord::all();

        return view('ords.index', compact('ords'));
    }

    public function create()
    {
        $ord = new Ord();
        return view('ords.create', compact('ord'));
    }

    public function store()
    {
        $ords = Ord::create($this->validateData());
        return redirect('/ords/'.$ords->id);
    }

    //Route Model Binding => \App\Customer $var
    public function show(Ord $ord)
    {
        return view('ords.show', compact('ord'));
    }

    public function edit(Ord $ord)
    {
        return view('ords.edit', compact('ord'));
    }

    public function update(Ord $ord)
    {
        $ord->update($this->validateData());    

        return redirect('/ords/'.$ord->id);
    }

    public function destroy(Ord $ord)
    {
        $ord->delete();

        return redirect('/ords');
    }


    public function validateData()
    {
        return request()->validate([
			'num' => 'required|max:30|',

			'date' => 'required|',

			'desc' => 'required|',
		]);
 }


    //----------------------------------------Rest Controllers----------------------
    
    public function restIndex($limit = 0)
    {
        return Ord::limit(99)->offset($limit)->get();
    }

    public function restStore()
    {
        return Ord::create($this->validateData());
    }

    //Route Model Binding => \App\Customer $var
    public function restShow(Ord $ord)
    {
        return $ord;
    }

    
    public function restUpdate(Ord $ord)
    {
        return $ord->update($this->validateData());
    }

    public function RestDestroy(Ord $ord)
    {
        return $ord->delete();
    }
}
        