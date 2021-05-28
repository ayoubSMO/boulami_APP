@extends('layouts.app')

@section('content')
    <!-- <h1>timeslots</h1>///timeslots/create -->
    <a href="/doctors/">@if(isset($my_doctor)){{$doc_list[$my_doctor]}}
                        @else {{$doc_list[0]}}
                        @endif Time Slots</a>

    {!! Form::open(['action' => ['App\Http\Controllers\R_d_v_Controller@index'], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}

   {{Form::select('doctor', $doc_list)}}
    
    {{Form::hidden('_method','GET')}}
    {{Form::submit('select', ['class'=>'btn btn-success'])}}
    {!! Form::close() !!}
    
    <hr>
    @if(count($timeslots) > 0)
        @foreach($timeslots as $timeslot)
            <div class="well">
                <div class="row">
                    <div class="col-md-8 col-sm-8">
                        <p>{{$timeslot->day}} {{$timeslot->startHour}} {{$timeslot->endHour}}
                        {!! Form::open(['action' => ['App\Http\Controllers\R_d_v_Controller@store',  $timeslot->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        {{Form::hidden('id',$timeslot->id, ['class' => 'form-control', 'placeholder' => ''])}}
                        @if(\App\R_d_v_::contains_($timeslot->id,$r_d_v_s))
                            {{Form::label('booked')}}
                        @else
                            {{Form::submit('book', ['class'=>'btn btn-success'])}}
                        @endif
                        {!! Form::close() !!}
                        </p>
                    </div>
                    <hr>
                </div>
            </div>
        @endforeach
    @else
        <p>No timeslots found</p>
    @endif
@endsection