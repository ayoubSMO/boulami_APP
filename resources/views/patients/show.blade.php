@extends('layouts.app')

@section('content')
    <a href="/patients" class="btn btn-default">Go Back</a>
    <h1>CIN: {{$patient->cin}}</h1>
    <br><br>
    <hr>
    <div>
        <p>First Name :{!!$patient->fname!!}</p>
        <p>Last Name :{!!$patient->lname!!}</p>
        <p>Email :{!!$patient->email!!}</p>
        <p>Phone :{!!$patient->phone!!}</p>
        <p>Function :{!!$patient->function!!}</p>
        <p>Login :{!!$patient->login!!}</p>
        <p>Password :{!!$patient->password!!}</p>
        <p>Speciality :{!!$patient->speciality!!}</p>
        <p>City :{!!$patient->city!!}</p>
        <p>Quote  :{!!$patient->quote!!}</p>
    </div>
    <hr>
            <a href="/patients/{{$patient->cin}}/edit" class="btn btn-default">Edit</a>
            {!!Form::open(['action' => ['App\Http\Controllers\PatientController@destroy', $patient->cin], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
@endsection