@extends('app')

@section('content')
    <div class="container">
        <h1>This is FYP <span class="glyphicon glyphicon-asterisk"></span></h1>
        <a href="{{ URL::to('/student') }}">This goes to the student page</a>
    </div>
@stop
