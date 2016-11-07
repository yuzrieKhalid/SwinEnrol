@extends('layouts.app')

@section('extra_head')
<meta name="_token" content="{{ csrf_token() }}" />
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Approved Issues</h3>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>Student ID</th>
                                            <th>Student Name</th>
                                            <th>Issue Type</th>
                                            <th>Date</th>
                                        </thead>

                                        @foreach($issues as $issue)
                                            <tr>
                                                <td class="td_studentID">{{ $issue->studentID }}</td>
                                                <td class="td_studentName">{{ $issue->student->givenName }} {{ $issue->student->surname }}</td>
                                                <td class="td_issueType">{{ $issue->enrolment_issues->issueType }}</td>
                                                <td class="td_date">{{ $issue->created_at }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div> <!-- end .table-responsive -->
                            </div> <!-- end .panel-body -->
                        </div> <!-- end .form-group -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
