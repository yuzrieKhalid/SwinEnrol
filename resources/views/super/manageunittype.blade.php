@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('super.menu')
            <div class="col-md-9">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h1>Manage Unit Types</h1>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <th>Types</th>
                                    <th><span class="pull-right">
                                        <a class="btn btn-default" href="{{ url('/super/manageunittype/create') }}" role="button">
                                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                        </a></span>
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach($types as $type)
                                    <tr>
                                        <td>{{ $type->unitType }}</td>
                                        <td>
                                            <div class="pull-right">
                                                <form method="POST" action="{{ route('super.manageunittype.destroy', $type->unitType) }}">
                                                    {!! csrf_field() !!}
                                                    {{-- Edit --}}
                                                    <a class="btn btn-default" href="{{ route('super.manageunittype.edit', $type->unitType) }}" role="button">Edit</a>

                                                    {{-- Delete --}}
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
