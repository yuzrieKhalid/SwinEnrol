@extends('layouts.app')

@section('content')
<div class="container">
    <!-- <div class="row"> -->
     <div class="row row-offcanvas row-offcanvas-left">
        <!-- Reserve 3 space for navigation column -->
       
         @include('coordinator.menu')

        <div class="col-md-9">
            <p class="pull-left visible-xs">
                <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Menu</button>
            </p>            
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>Manage Unit Listings</h1>
                    <!-- Year Dropdown -->
                    {{--<div class="btn-group btn-group-justified" role="group" aria-label="...">
                        <div class="btn-group" role="group">
                            <button type="button" id="dropdown-year" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Year
                            <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdown-year">
                                <li><a href="#">Year 1</a></li>
                                <li><a href="#">Year 2</a></li>
                                <li><a href="#">Year 3</a></li>
                            </ul>
                        </div>

                        <!-- Semester Dropdown -->
                        <div class="btn-group" role="group">
                            <button type="button" id="dropdown-semester" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Semester
                            <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdown-semester">
                                <li><a href="#">Semester 1</a></li>
                                <li><a href="#">Semester 2</a></li>
                            </ul>
                        </div>

                        <!-- Course Dropdown -->
                        <div class="btn-group" role="group">
                            <button type="button" id="dropdown-course" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Course
                            <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdown-course">
                                <li><a href="#">Course 1</a></li>
                                <li><a href="#">Course 2</a></li>
                                <li><a href="#">Course 3</a></li>
                            </ul>
                        </div>
                    </div>--}}
                </div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <th>Unit Code</th>
                            <th>Unit Title</th>
                            <th><a class="pull-right" data-toggle="modal" data-target="#addUnit" role="button"><span class="btn-default glyphicon glyphicon-plus" aria-hidden="true"></span></a></th>
                        </thead>
                        {{-- Fetch data for study planner --}}
                        @foreach ($termUnits as $unit)
                        <tr>
                            <td>{{ $unit->unitCode }}</td>
                            <td>{{ $unit->unit->unitName }}</td>
                            <td><a class="pull-right" href="#" role="button"><span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span></a></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <!-- Add Unit Modal-->
            <div class="modal fade" id="addUnit" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h2 class="modal-title">Create New Unit</h2>
                        </div>

                        <div class="modal-body">
                            <div class="form-group">

                                <label class="control-label" for="unit">Unit:</label>
                                <select class="form-control" name="unit">
                                    @foreach($units as $unit)
                                    <option value="{{ $unit->unitCode }}">{{ $unit->unitCode }} - {{ $unit->unitName }}</option>
                                    @endforeach
                                </select>
                                {{--
                                <label class="control-label" for="unitName">Unit Name:</label>
                                <input type="text" name="unitName" class="form-control" id="unitName">

                                <label class="control-label" for="courseCode">Course Code:</label>
                                <!-- <input type="text" name="courseCode" class="form-control" id="courseCode"> -->
                                <select class="form-control" name="courseCode">
                                    <option value="0">None</option>

                                    @foreach($courses as $course)
                                    <option value="{{ $course->courseCode }}">{{ $course->courseCode }}</option>
                                    @endforeach
                                </select>

                                <div class="form-group">
                                    <label for="prerequisite">Prerequisite</label>
                                    <!-- <input type="text" name="prerequisite" class="form-control" id="prerequisite"> -->
                                    <select class="form-control" name="prerequisite">
                                        <option value="None">None</option>
                                        @foreach($units as $unit)
                                        <option value="{{ $unit->unitCode }}">{{ $unit->unitCode }} {{ $unit->unitName }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="corequisite">Corequisite</label>
                                    <!-- <input type="text" name="corequisite" class="form-control" id="corequisite"> -->
                                    <select class="form-control" name="corequisite">
                                        <option value="None">None</option>
                                        @foreach($units as $unit)
                                        <option value="{{ $unit->unitCode }}">{{ $unit->unitCode }} {{ $unit->unitName }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="antirequisite">Antirequisite</label>
                                    <!-- <input type="text" name="antirequisite" class="form-control" id="antirequisite"> -->
                                    <select class="form-control" name="antirequisite">
                                        <option value="None">None</option>
                                        @foreach($units as $unit)
                                        <option value="{{ $unit->unitCode }}">{{ $unit->unitCode }} {{ $unit->unitName }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <label class="control-label" for="minimumCompletedUnits">Minimum Completed Units:</label>
                                <input id="minimumCompletedUnits" type="text" name="minimumCompletedUnits" value="0">

                                <label class="control-label" for="core">This is a Core:
                                    <input type="checkbox" autocomplete="off" name="core" id="core">
                                </label>
                                --}}
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="submit btn btn-default" id="submit" data-method="POST" data-url="{{-- route('coordinator.manageunits.store') --}}">Create</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end Add Unit Modal -->
        </div>
    </div>
    <!-- </div> -->

    
</div>
@stop

<!-- @section('extra_js')
<script>
    $(document$).ready(function(){

    $('.nav-menu-bt').click(function() {
        $('.navbar').css('-webkit-transform', 'translate(0,0)');
        console.log('Pressed');
    });
});

------ css ------
.navbar{
  position: fixed;
  height:100%;
  width:20%;
  overflow: hidden;
  background-color: #48a770;

  -webkit-transform: translate(-100,0);
}

</script>
@stop -->