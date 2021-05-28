@extends('layouts.app')

@section('content')
    <!-- <h1>timeslots</h1>///timeslots/create -->
    <a href="/timeslots/create">create timeslot</a>

    {!! Form::open(['action' => ['App\Http\Controllers\TimeslotController@index'], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
    {{Form::date('date','', ['class' => 'form-control', 'placeholder' => ''])}}
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
                        {!! Form::open(['action' => ['App\Http\Controllers\TimeslotController@update',  $timeslot->id], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
                        {{Form::hidden('_method','PUT')}}
                        @if($timeslot->isDisponible)
                            {{Form::submit('Disable', ['class'=>'btn btn-primary'])}}
                        @else
                            {{Form::submit('Enable', ['class'=>'btn btn-success'])}}
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