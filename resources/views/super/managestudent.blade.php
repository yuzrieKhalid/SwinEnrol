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
                                            <form method="POST" action="{{ route('super.managestudent.destroy', $user->username) }}">
                                                <a class="btn btn-default" href="{{ route('super.managestudent.edit', $user->username) }}" role="button">Edit</a>
                                                {!! csrf_field() !!}
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
