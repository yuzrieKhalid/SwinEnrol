@extends('app')

@section('content')
    <div class="container">
        <h1>This is SPARTA! JKJK.. this is student page <span class="glyphicon glyphicon-asterisk"></span></h1>
        <a href="{{ URL::to('/student') }}">This goes to the student page</a>
        <h2>{{ $asd }}</h2>
    </div>
@stop
