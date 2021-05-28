@extends('layouts.app')

@section('content')
    <a href="/doctors" class="btn btn-default">Go Back</a>
    <h1>CIN: {{$doctor->cin}}</h1>
    <br><br>
    <hr>
    <div>
        <p>First Name :{!!$doctor->fname!!}</p>
        <p>Last Name :{!!$doctor->lname!!}</p>
        <p>Email :{!!$doctor->email!!}</p>
        <p>Phone :{!!$doctor->phone!!}</p>
        <p>Function :{!!$doctor->function!!}</p>
        <p>Login :{!!$doctor->login!!}</p>
        <p>Password :{!!$doctor->password!!}</p>
        <p>Speciality :{!!$doctor->speciality!!}</p>
        <p>City :{!!$doctor->city!!}</p>
        <p>Quote  :{!!$doctor->quote!!}</p>
    </div>
    <hr>
            <a href="/doctors/{{$doctor->cin}}/edit" class="btn btn-default">Edit</a>
            {!!Form::open(['action' => ['App\Http\Controllers\DoctorController@destroy', $doctor->cin], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
@endsection