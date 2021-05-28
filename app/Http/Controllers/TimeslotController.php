<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use \App\Timeslot;
use \App\Doctor;
Use \Carbon\Carbon;

class TimeslotController extends Controller
{
    public $timeline = ['08:00','08:30','09:00','09:30','10:00','10:30','11:00','11:30','12:00','12:30'];
    public function index(Timeslot $timeslot)
    {
        if(request()->date==null)
            $date =  Carbon::now()->format('Y-m-d');
        else 
            $date =  request()->date;
        $user = Auth::user();
        $My_doctor = Doctor::where('user_id','=',$user->id)->get()[0];
        $timeslots = Timeslot::where('day','=',$date)->where('cin_doc','=',$My_doctor->cin)->get();
        if(count($timeslots)<8){
            foreach($this->timeline as $key => $time)
            {
                if($key == (count($this->timeline)-1))break;

                $timeslot = Timeslot::create([
                    'day' => $date , 
                    'startHour'=> $time,
                    'endHour'=> $this->timeline[$key+1],
                    'isDisponible'=> 1,
                    'cin_doc'=>$My_doctor->cin
                ]);
            }
            $timeslots = Timeslot::where('day','=',$date)->get();
        } 
        print_r(request()->date);
        return view('timeslots.index', compact('timeslots'));
    }

    public function create()
    {
        $timeslot = new Timeslot();
        return view('timeslots.create', compact('timeslot'));
    }

    public function store()
    {
        $user = Auth::user();
        $timeslots = Timeslot::create($this->validateData());
        
        return redirect('timeslots/'.$timeslots->id);
    }

    //Route Model Binding => \App\Customer $var
    public function show(Timeslot $timeslot)
    {
        return view('timeslots.show', compact('timeslot'));
    }

    public function edit(Timeslot $timeslot)
    {
        return view('timeslots.edit', compact('timeslot'));
    }

    public function update(Timeslot $timeslot)
    {
        if($timeslot->isDisponible)
            $timeslot->isDisponible=0;
        else $timeslot->isDisponible=1;
        $timeslot->update($this->validateData());    
        return redirect('timeslots/');
    }

    public function destroy(Timeslot $timeslot)
    {
        $timeslot->delete();

        return redirect('/timeslots');
    }


    public function validateData()
    {
        return request()->validate([
			'id' => '',
		]);
 }


    //----------------------------------------Rest Controllers----------------------
    
    public function restIndex($limit = 0)
    {
        return Timeslot::limit(99)->offset($limit)->get();
    }

    public function restStore()
    {
        return Timeslot::create($this->validateData());
    }

    //Route Model Binding => \App\Customer $var
    public function restShow(Timeslot $timeslot)
    {
        return $timeslot;
    }

    
    public function restUpdate(Timeslot $timeslot)
    {
        return $timeslot->update($this->validateData());
    }

    public function RestDestroy(Timeslot $timeslot)
    {
        return $timeslot->delete();
    }
}
        