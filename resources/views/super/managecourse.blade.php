@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('super.menu')
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1>Manage Course</h1>
                    </div>
                    <div class="panel-body">
                        <!-- the table needs and url to allow the ajax to fetch the data from the controller (which is the json array) -->
                        <table class="table" id="units_table" data-url="{{ route('coordinator.manageunits.index') }}">
                            <thead>
                                <th>Course ID</th>
                                <th>Course Name</th>
                                <th></th>
                                <th><span><a class="btn btn-default" href="#" role="button" data-toggle="modal" data-target="#addUnit"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></span></th>
                            </thead>

                          </table>

                    </div>
                </div>

                <div class="modal fade" id="addUnit" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h2 class="modal-title">Create New Unit</h2>
                            </div>


                            <div class="modal-footer">
                                <button type="submit" class="submit btn btn-default" id="submit">Create</button>
                            </div>
                        </div>
                    </div>
                </div>




            </div>
        </div>
    </div>
@stop
