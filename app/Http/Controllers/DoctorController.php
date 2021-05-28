<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Doctor;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all('cin','fname');

        return view('doctors.index')->with('doctors',$doctors);;
    }

    public function create()
    {
        $doctor = new Doctor();
        return view('doctors.create');
    }

    public function store()
    {
        $doctors = Doctor::create($this->validateData());
        $user = new User();
        $user->password = Hash::make($doctors->password);
        $user->email = $doctors->email;
        $user->name = $doctors->fname;
        $user->save();
        $doctors->user_id = $user->id;
        $doctors->update($this->validateData());
        return redirect('/doctors');
    }

    //Route Model Binding => \App\Customer $var
    public function show(Doctor $doctor)
    {
        // $doctor = Doctor::findOrFail($cin);
        return view('doctors.show', compact('doctor'));
    }

    public function edit(Doctor $doctor)
    {
        return view('doctors.edit', compact('doctor'));
    }

    public function update(Doctor $doctor)
    {
        $doctor->update($this->validateData());
        $user = User::findorFail($doctor->user_id);;
        $user->password = Hash::make($doctor->password);
        $user->email = $doctor->email;
        $user->name = $doctor->fname;
        $user->save();

        return redirect('doctors/'.$doctor->id);
    }

    public function destroy(Doctor $doctor)
    {
        $user = User::findorFail($doctor->user_id);
        $user->delete();
        $doctor->delete();

        return redirect('/doctors');
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

			'speciality' => 'required|max:191|',

			'city' => 'required|max:191|',

			'quote' => 'required|',
		]);
 }


    //----------------------------------------Rest Controllers----------------------
    
    public function restIndex($limit = 0)
    {
        return Doctor::limit(99)->offset($limit)->get();
    }

    public function restStore()
    {
        return Doctor::create($this->validateData());
    }

    //Route Model Binding => \App\Customer $var
    public function restShow(Doctor $doctor)
    {
        return $doctor;
    }

    
    public function restUpdate(Doctor $doctor)
    {
        return $doctor->update($this->validateData());
    }

    public function RestDestroy(Doctor $doctor)
    {
        return $doctor->delete();
    }
}
        