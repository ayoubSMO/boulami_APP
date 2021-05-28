@extends('layouts.app')

@section('content')
    <h1>Edit patient</h1>
    {!! Form::open(['action' => ['App\Http\Controllers\PatientController@update', $patient->cin], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('cin', 'CIN')}}
            {{Form::text('cin', $patient->cin, ['class' => 'form-control', 'placeholder' => ''])}}
        </div>
        <div class="form-group">
            {{Form::label('lname', 'Last Name')}}
            {{Form::text('lname', $patient->lname, ['class' => 'form-control', 'placeholder' => ''])}}
        </div>
        <div class="form-group">
            {{Form::label('fname', 'First Name')}}
            {{Form::text('fname', $patient->fname, ['class' => 'form-control', 'placeholder' => ''])}}
        </div>
        <div class="form-group">
            {{Form::label('email', 'Email')}}
            {{Form::text('email', $patient->email, ['class' => 'form-control', 'placeholder' => ''])}}
        </div>
        <div class="form-group">
            {{Form::label('phone', 'Phone')}}
            {{Form::text('phone', $patient->phone, ['class' => 'form-control', 'placeholder' => ''])}}
        </div>
        <div class="form-group">
            {{Form::label('fonction', 'Function')}}
            {{Form::text('fonction', $patient->fonction, ['class' => 'form-control', 'placeholder' => ''])}}
        </div>
        <div class="form-group">
            {{Form::label('login', 'Login')}}
            {{Form::text('login', $patient->login, ['class' => 'form-control', 'placeholder' => ''])}}
        </div>
        <div class="form-group">
            {{Form::label('password', 'Password')}}
            {{Form::text('password', $patient->password, ['class' => 'form-control', 'placeholder' => ''])}}
        </div>
        
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection