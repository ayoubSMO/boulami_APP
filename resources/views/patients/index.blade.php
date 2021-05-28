@extends('layouts.app')

@section('content')
    <!-- <h1>patients</h1>///patients/create -->
    <a href="/patients/create">create patient</a>
    @if(count($patients) > 0)
        @foreach($patients as $patient)
            <div class="well">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h3><a href="/patients/{{$patient->cin}}">{{$patient->lname}} {{$patient->fname}}</a></h3>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <p>No patients found</p>
    @endif
@endsection