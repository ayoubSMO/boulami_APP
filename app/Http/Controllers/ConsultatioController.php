<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Consultatio;

class ConsultatioController extends Controller
{
    public function index()
    {
        $consultation = Consultatio::all();

        return view('consultation.index', compact('consultation'));
    }

    public function create()
    {
        $consultatio = new Consultatio();
        return view('consultation.create', compact('consultatio'));
    }

    public function store()
    {
        $consultation = Consultatio::create($this->validateData());
        return redirect('consultation/'.$consultation->id);
    }

    //Route Model Binding => \App\Customer $var
    public function show(Consultatio $consultatio)
    {
        return view('consultation.show', compact('consultatio'));
    }

    public function edit(Consultatio $consultatio)
    {
        return view('consultation.edit', compact('consultatio'));
    }

    public function update(Consultatio $consultation)
    {
        $consultation->update($this->validateData());    

        return redirect('consultation/'.$consultation->id);
    }

    public function destroy(Consultatio $consultatio)
    {
        $consultatio->delete();

        return redirect('/consultation');
    }


    public function validateData()
    {
        return request()->validate([
			'cin_doc' => 'required|max:8|',

			'cin_pat' => 'required|max:8|',

			'date' => 'required|',

			'ord' => 'required|max:30|',
		]);
 }


    //----------------------------------------Rest Controllers----------------------
    
    public function restIndex($limit = 0)
    {
        return Consultatio::limit(99)->offset($limit)->get();
    }

    public function restStore()
    {
        return Consultatio::create($this->validateData());
    }

    //Route Model Binding => \App\Customer $var
    public function restShow(Consultatio $consultatio)
    {
        return $consultatio;
    }

    
    public function restUpdate(Consultatio $consultatio)
    {
        return $consultatio->update($this->validateData());
    }

    public function RestDestroy(Consultatio $consultatio)
    {
        return $consultatio->delete();
    }
}
        