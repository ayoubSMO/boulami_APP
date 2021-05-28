@extends('layouts.app')

@section('content')
    <h1>Edit doctor</h1>
    {!! Form::open(['action' => ['App\Http\Controllers\DoctorController@update', $doctor->cin], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('cin', 'CIN')}}
            {{Form::text('cin', $doctor->cin, ['class' => 'form-control', 'placeholder' => ''])}}
        </div>
        <div class="form-group">
            {{Form::label('lname', 'Last Name')}}
            {{Form::text('lname', $doctor->lname, ['class' => 'form-control', 'placeholder' => ''])}}
        </div>
        <div class="form-group">
            {{Form::label('fname', 'First Name')}}
            {{Form::text('fname', $doctor->fname, ['class' => 'form-control', 'placeholder' => ''])}}
        </div>
        <div class="form-group">
            {{Form::label('email', 'Email')}}
            {{Form::text('email', $doctor->email, ['class' => 'form-control', 'placeholder' => ''])}}
        </div>
        <div class="form-group">
            {{Form::label('phone', 'Phone')}}
            {{Form::text('phone', $doctor->phone, ['class' => 'form-control', 'placeholder' => ''])}}
        </div>
        <div class="form-group">
            {{Form::label('fonction', 'Function')}}
            {{Form::text('fonction', $doctor->fonction, ['class' => 'form-control', 'placeholder' => ''])}}
        </div>
        <div class="form-group">
            {{Form::label('login', 'Login')}}
            {{Form::text('login', $doctor->login, ['class' => 'form-control', 'placeholder' => ''])}}
        </div>
        <div class="form-group">
            {{Form::label('password', 'Password')}}
            {{Form::text('password', $doctor->password, ['class' => 'form-control', 'placeholder' => ''])}}
        </div>
        <div class="form-group">
            {{Form::label('speciality', 'Speciality')}}
            {{Form::text('speciality', $doctor->speciality, ['class' => 'form-control', 'placeholder' => ''])}}
        </div>
        <div class="form-group">
            {{Form::label('quote', 'Quote')}}
            {{Form::text('quote', $doctor->quote, ['class' => 'form-control', 'placeholder' => ''])}}
        </div>
        <div class="form-group">
            {{Form::label('city', 'City')}}
            {{Form::text('city', $doctor->city, ['class' => 'form-control', 'placeholder' => ''])}}
        </div>
        
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection