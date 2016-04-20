@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- Reserve 3 space for navigation column -->
        <div class="col-md-3">
            <div class="list-group">
                <a href="{{ url('/student') }}" class="list-group-item">Home</a>
                <a href="{{ url('/student/manageunits') }}" class="list-group-item">Manage Units</a>
                <a href="{{ url('/student/viewstudyplanner') }}" class="list-group-item active">View Study Planner</a>
                <a href="{{ url('/student/viewunitlistings') }}" class="list-group-item">View Unit Listings</a>
                <a href="{{ url('/student/internalcoursetransfer') }}" class="list-group-item">Internal Course Transfer</a>
                <a href="{{ url('/student/contactcoordinator') }}" class="list-group-item">Contact Coordinator</a>
            </div>
        </div>

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>Units</h1>
                </div>

                <div class="panel-body">
                    <!-- Sample Content 1 -->
                    <h2><small>Year 1 Sem 1</small></h2>
                    <table class="table">
                        <thead>
                            <th>Unit Code</th>
                            <th>Unit Title</th>
                            <th>Pre-requisites</th>
                        </thead>
                        <tr>
                            <td>1</td>
                            <td>Unit Title 1</td>
                            <td>Pre-requisite 1</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Unit Title 2</td>
                            <td>Pre-requisite 2</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Unit Title 3</td>
                            <td>Pre-requisite 3</td>
                        </tr>
                    </table>

                    <!-- Sample Content 2 -->
                    <h2><small>Year 1 Winter Sem</small></h2>
                    <table class="table">
                        <thead>
                            <th>Unit Code</th>
                            <th>Unit Title</th>
                            <th>Pre-requisites</th>
                        </thead>
                        <tr>
                            <td>1</td>
                            <td>Unit Title 1</td>
                            <td>Pre-requisite 1</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Unit Title 2</td>
                            <td>Pre-requisite 2</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Unit Title 3</td>
                            <td>Pre-requisite 3</td>
                        </tr>
                    </table>
                </div>
            </div> <!-- end .panel -->

        </div>
    </div>
</div>
@stop
