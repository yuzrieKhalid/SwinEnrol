@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h3>Manage Students</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table" id="user_table">
                          <!--  -->
                          <div class="col-md-4">
                            <form class="form" method="GET">
                              <input type="text" class="form-control" id='student' name='student' placeholder="Search">
                              <div class="input-group-btn">
                                  <button class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
                              </div>

                            </form>
                          </div>
                          <!--  -->
                            <thead>
                                <th>Username</th>
                                <th><span class="pull-right"><a class="btn btn-default" href="{{ url('/super/managestudent/create') }}" role="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></span></th>
                            </thead>
                            @foreach($users as $user)
                                <tr>
                                    <td class="td_username">{{ $user->username }}</td>
                                    <td>
                                        <div class="pull-right">
                                            <button id="delete" class="btn btn-danger" data-toggle="modal" data-target="#delete_{{ $user->username }}">
                                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                {{-- Delete Confirmation Modal --}}
                                <div class="modal fade" id="delete_{{ $user->username }}" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h2 class="modal-title">Delete {{ $user->username }}</h2>
                                            </div>

                                            <div class="modal-body">
                                                <p>Are you sure you want to delete {{ $user->username }}?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <form method="POST" action="{{ route('super.managestudent.destroy', $user->username) }}">
                                                    <a class="btn btn-default" href="{{ route('super.managestudent.edit', $user->username) }}" role="button">Edit</a>
                                                    {!! csrf_field() !!}
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                                                </form>
                                                <button class="btn btn-primary" data-dismiss="modal">CANCEL</button>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end .modal -->
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
