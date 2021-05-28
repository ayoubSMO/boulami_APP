<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\R_d_v_;
use \App\Doctor;
use \App\Timeslot;
Use \Carbon\Carbon;

class R_d_v_Controller extends Controller
{
    public function index()
    {
        if(request()->date==null)
            $date =  Carbon::now()->format('Y-m-d');
        else 
            $date =  request()->date;

        $doctors = Doctor::all();
        $my_doctor = $doctors[0]->cin;
        if(request()->doctor)
            $my_doctor = request()->doctor;
        $timeslots = Timeslot::where('day','=',$date)->where('cin_doc','=',$my_doctor)->get();
        $r_d_v_s = R_d_v_::where('cin_doc','=',$my_doctor)->get();
       
        $doc_list =[];
        foreach($doctors as $doctor)
            $doc_list[$doctor->cin] = $doctor->lname; 

        return view('r_d_v_s.index', compact('r_d_v_s','timeslots','doc_list','my_doctor'));
    }

    public function create()
    {
        $r_d_v_ = new R_d_v_();
        return view('r_d_v_s.create', compact('r_d_v_'));
    }

    public function store()
    {
        $r_d_v = new R_d_v_();
        $r_d_v->timeslot = request()->id ;
        $r_d_v->cin_doc ='hh77q';
        $r_d_v->cin_pat ='hh77q';
        $r_d_v->save();
        // $r_d_v = R_d_v_::create($this->validateData());
        return redirect('/rdv');
        // echo request()->id ;
    }

    //Route Model Binding => \App\Customer $var
    public function show(R_d_v_ $r_d_v_)
    {
        return view('r_d_v_s.show', compact('r_d_v_'));
    }

    public function edit(R_d_v_ $r_d_v_)
    {
        return view('r_d_v_s.edit', compact('r_d_v_'));
    }

    public function update(R_d_v_ $r_d_v_)
    {
        $r_d_v_->update($this->validateData());    

        return redirect('/r_d_v_s/'.$r_d_v_->id);
    }

    public function destroy(R_d_v_ $r_d_v_)
    {
        $r_d_v_->delete();

        return redirect('/r_d_v_s');
    }


    public function validateData()
    {
        return request()->validate([
			'id' => '',

			'timeslot' => 'required|',
		]);
 }


    //----------------------------------------Rest Controllers----------------------
    
    public function restIndex($limit = 0)
    {
        return R_d_v_::limit(99)->offset($limit)->get();
    }

    public function restStore()
    {
        return R_d_v_::create($this->validateData());
    }

    //Route Model Binding => \App\Customer $var
    public function restShow(R_d_v_ $r_d_v_)
    {
        return $r_d_v_;
    }

    
    public function restUpdate(R_d_v_ $r_d_v_)
    {
        return $r_d_v_->update($this->validateData());
    }

    public function RestDestroy(R_d_v_ $r_d_v_)
    {
        return $r_d_v_->delete();
    }
}
        