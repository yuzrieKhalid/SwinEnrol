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
                        <div class="row">
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="search-criteria" placeholder="Search">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" id="search">
                                            <span class="glyphicon glyphicon-search"></span>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <table class="table" id="user_table">
                            <thead>
                                <th>Username</th>
                                <th><span class="pull-right"><a class="btn btn-default" name="addSt" id="addSt" href="{{ url('/super/managestudent/create') }}" role="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></span></th>
                            </thead>
                            @foreach($users as $user)
                                <tr class="student">
                                    <td class="td_username">{{ $user->username }}</td>
                                    <td>
                                        <div class="pull-right">
                                            <a class="btn btn-default" href="{{ route('super.managestudent.edit', $user->username) }}" role="button">Edit</a>
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
                                                    {!! csrf_field() !!}
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> DELETE</a>
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

@section('extra_js')
<script type="text/javascript">
(function() {
    // Search
    $("#search-criteria").keyup(function() {
        // when something is typed in the box, it will hide all
        let searchvalue = $(this).val().toLowerCase()
        $('.student').hide()

        // if the text from the tr matches any part of the search value (indexOf), show
        $('.student').each(function() {
            let text = $(this).text().toLowerCase()
            if (text.indexOf(searchvalue) != -1)
                $(this).show()
        })
    })
}) ()
</script>
@stop
