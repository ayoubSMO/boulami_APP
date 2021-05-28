<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Patient;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::all();

        return view('patients.index', compact('patients'));
    }

    public function create()
    {
        $patient = new Patient();
        return view('patients.create', compact('patient'));
    }

    public function store()
    {
        $patients = Patient::create($this->validateData());
        $user = new User();
        $user->password = Hash::make($patients->password);
        $user->email = $patients->email;
        $user->name = $patients->fname;
        $user->save();
        $patients->user_id = $user->id;
        $patients->update($this->validateData());
        return redirect('patients/'.$patients->id);
    }

    //Route Model Binding => \App\Customer $var
    public function show(Patient $patient)
    {
        return view('patients.show', compact('patient'));
    }

    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    public function update(Patient $patient)
    {
        $patient->update($this->validateData());    
        $user = User::findorFail($patient->user_id);;
        $user->password = Hash::make($patient->password);
        $user->email = $patient->email;
        $user->name = $patient->fname;
        $user->save();
        return redirect('patients/'.$patient->id);
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();
        $user = User::findorFail($patient->user_id);
        $user->delete();
        return redirect('/patients');
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
        return Patient::limit(99)->offset($limit)->get();
    }

    public function restStore()
    {
        return Patient::create($this->validateData());
    }

    //Route Model Binding => \App\Customer $var
    public function restShow(Patient $patient)
    {
        return $patient;
    }

    
    public function restUpdate(Patient $patient)
    {
        return $patient->update($this->validateData());
    }

    public function RestDestroy(Patient $patient)
    {
        return $patient->delete();
    }
}
        