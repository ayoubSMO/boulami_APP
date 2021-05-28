@extends('layouts.app')

@section('content')
    <!-- <h1>Doctors</h1>///doctors/create -->
    <a href="/doctors/create">create doctor</a>
    @if(count($doctors) > 0)
        @foreach($doctors as $doctor)
            <div class="well">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h3><a href="/doctors/{{$doctor->cin}}">{{$doctor->lname}} {{$doctor->fname}}</a></h3>
                        <p>{{$doctor->quote}}</p>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <p>No doctors found</p>
    @endif
@endsection