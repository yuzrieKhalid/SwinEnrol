@extends('layouts.app')

@section('extra_head')
<link href="{{ asset('css/bootstrap-datepicker3.min.css') }}" rel="stylesheet">
<meta name="_token" content="{{ csrf_token() }}" />
@stop

@section('content')
<div class="container">
    <div class="row">
        <!-- Reserve 3 space for navigation column -->
        <div class="col-md-3">
            <div class="list-group">
                <a href="{{ url('/admin') }}" class="list-group-item">Home</a>
                <a href="{{ url('/admin/managestudents') }}" class="list-group-item active">Manage Students</a>
                <a href="{{ url('/admin/setenrolmentdates') }}" class="list-group-item">Set Enrolment Dates</a>
            </div>
        </div>

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>Manage Students</h1>
                </div>

                <div class="panel-body">
                    <h3>
                        <span class="pull-right">
                            <!-- the modal is at the bottom of the page-->
                            <a class="btn btn-default" href="#" role="button" data-toggle="modal" data-target="#adminAddStudent">
                                Add Student
                            </a>
                            <a class="btn btn-default" href="#" role="button">Import File</a>
                            <a class="btn btn-default" href="#" role="button">
                                <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                            </a>
                        </span>
                        <label for="search">Search Students:</label>
                        <input type="search" name="search" id="search"></input>
                    </h3>
                    <table class="table">
                        <thead>
                            <th>Student ID</th>
                            <th colspan="2">Student Name</th>
                            <td>
                        </thead>
                        <tr>
                            <td>1</td>
                            <td>Student Name 1</td>
                            <td><a class="pull-right" href="#" role="button"><span class="pull-right">
                                <a class="btn btn-default" href="#" role="button">Edit</a>
                                <a class="btn btn-default" href="#" role="button"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Student Name 2</td>
                            <td><a class="pull-right" href="#" role="button"><span class="pull-right">
                                <a class="btn btn-default" href="#" role="button">Edit</a>
                                <a class="btn btn-default" href="#" role="button"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                                </span></a>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Student Name 3</td>
                            <td><a class="pull-right" href="#" role="button"><span class="pull-right">
                                <a class="btn btn-default" href="#" role="button">Edit</a>
                                <a class="btn btn-default" href="#" role="button"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                                </span></a>
                            </td>
                        </tr>
                    </table>
                </div>

                <!-- Modal: Add Student -->
                <div class="modal fade" id="adminAddStudent" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h2 class="modal-title">Add a Student</h2>
                            </div>

                            <form class="form" method="POST" action="{{ url('/admin/managestudents') }}">
                                <div class="modal-body">
                                    <!-- Student Personal Details  -->
                                    <h3>Personal Details</h3>
                                    <div class="form-group">
                                        <label for="gender">Gender: </label>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Gender <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a href="#">Male</a></li>
                                                <li><a href="#">Female</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div id="dateOfBirth">
                                        <label for="dateOfBirth">Date of Birth: </label>
                                        <div class="input-group date">
                                            <input type="text" class="form-control" >
                                            <div class="input-group-addon">
                                                <span class="glyphicon glyphicon-th"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="surname">Family Name / Surname:</label>
                                        <input type="text" class="form-control" id="surname" placeholder="John">
                                    </div>

                                    <div class="form-group">
                                        <label for="givenName">Given Name:</label>
                                        <input type="text" class="form-control" id="givenName" placeholder="Doe">
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" id="email" placeholder="example.com">
                                    </div>

                                    <!-- Overseas Address Details -->
                                    <h3>Overseas Address Details</h3>
                                    <div class="form-group">
                                        <label for="overseasAddress">Overseas Address:</label>
                                        <textarea class="form-control" id="overseasAddress" rows="2"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="overseasCountry">Overseas Country:</label>
                                        <input type="text" class="form-control" id="overseasCountry" placeholder="United States">
                                    </div>

                                    <div class="form-group">
                                        <label for="overseasPostcode">Overseas Postcode:</label>
                                        <input type="text" class="form-control" id="overseasPostcode" placeholder="129320">
                                    </div>

                                    <!-- Malaysian Address Details -->
                                    <h3>Malaysian Address Details</h3>
                                    <div class="form-group">
                                        <label for="malaysianAddress">Malaysian Address:</label>
                                        <textarea class="form-control" id="malaysianAddress" rows="2"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="malaysianCountry">Malaysian Country:</label>
                                        <input type="text" class="form-control" id="malaysianCountry" placeholder="Sarawak">
                                    </div>

                                    <div class="form-group">
                                        <label for="malaysianPostcode">Malaysian Postcode:</label>
                                        <input type="text" class="form-control" id="malaysianPostcode" placeholder="96100">
                                    </div>

                                    <!-- Contact Details -->
                                    <div class="form-group">
                                        <label for="overseasTelephone">Overseas Postcode:</label>
                                        <input type="text" class="form-control" id="overseasTelephone" placeholder="012345678">
                                    </div>

                                    <!-- Contact Details -->
                                    <h3>Contact Details</h3>
                                    <div class="form-group">
                                        <label for="malaysianTelephone">Malaysian Telephone:</label>
                                        <input type="text" class="form-control" id="malaysianTelephone">
                                    </div>

                                    <div class="form-group">
                                        <label for="overseasTelephone">Overseas Telephone:</label>
                                        <input type="text" class="form-control" id="overseasTelephone">
                                    </div>

                                    <div class="form-group">
                                        <label for="fax">Fax:</label>
                                        <input type="text" class="form-control" id="fax">
                                    </div>

                                    <div class="form-group">
                                        <label for="mobile">Mobile:</label>
                                        <input type="text" class="form-control" id="mobile">
                                    </div>

                                    <!-- Visa/Citizenship Details -->
                                    <h3>Visa Details</h3>
                                    <div class="form-group">
                                        <label for="countryOfCitizenship">Country of Citizenship:</label>
                                        <input type="text" class="form-control" id="countryOfCitizenship">
                                    </div>

                                    <div class="form-group">
                                        <label for="birthCountry">Birth Country:</label>
                                        <input type="text" class="form-control" id="birthCountry">
                                    </div>

                                    <div class="form-group">
                                        <label for="identityCardOrPassportNumber">Identity Card / Passport Number:</label>
                                        <input type="text" class="form-control" id="identityCardOrPassportNumber">
                                    </div>

                                    <div class="form-group">
                                        <label for="passportExpiry">Passport Expiry:</label>
                                        <input type="text" class="form-control" id="passportExpiry">
                                    </div>

                                    <div class="form-group">
                                        <label for="visaValidity">Visa Validity:</label>
                                        <input type="text" class="form-control" id="visaValidity">
                                    </div>

                                    <div class="form-group">
                                        <label for="visaType">Visa Type:</label>
                                        <input type="text" class="form-control" id="visaType">
                                    </div>

                                    <div class="form-group">
                                        <label for="visaExpiry">Visa Expiry:</label>
                                        <input type="text" class="form-control" id="visaExpiry">
                                    </div>

                                    <div class="form-group">
                                        <label for="visaCollectionLoaction">Visa Collection Location:</label>
                                        <input type="text" class="form-control" id="visaCollectionLoaction">
                                    </div>

                                    <h3>Study Details</h3>
                                    <div class="form-group">
                                        <label for="firstName">Course Level</label>

                                        <!-- select to be populated from database -->
                                        <select class="form-control">
                                            <option value="1">Foundation</option>
                                            <option value="2">Diploma</option>
                                            <option value="3">Degree</option>
                                            <option value="4">Masters (by Coursework)</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="firstName">Course</label>
                                        <!-- select to be populated from database -->
                                        <select class="form-control">
                                            <option value="1">Course 1</option>
                                            <option value="2">Course 2</option>
                                            <option value="3">Course 3</option>
                                        </select>
                                    </div>
                                    <div id="courseCommencement">
                                        <label for="courseCommencement">Course Commencement: </label>
                                        <div class="input-group date">
                                            <input type="text" class="form-control" >
                                            <div class="input-group-addon">
                                                <span class="glyphicon glyphicon-th"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <h3>Emergency Contact</h3>
                                    <div class="form-group">
                                        <label for="emergencyContactName">Emergency Contact Name:</label>
                                        <input type="text" class="form-control" id="emergencyContactName">
                                    </div>

                                    <div class="form-group">
                                        <label for="emergencyContactAddress">Emergency Contact Address:</label>
                                        <input type="text" class="form-control" id="emergencyContactAddress">
                                    </div>

                                    <div class="form-group">
                                        <label for="emergencyContactTelephone">Emergency Contact Telephone:</label>
                                        <input type="text" class="form-control" id="emergencyContactTelephone">
                                    </div>

                                    <div class="form-group">
                                        <label for="emergencyContactFax">Emergency Contact Fax:</label>
                                        <input type="text" class="form-control" id="emergencyContactFax">
                                    </div>
                                    <div class="form-group">
                                        <label for="emergencyContactMobile">Emergency Contact Mobile:</label>
                                        <input type="text" class="form-control" id="emergencyContactMobile">
                                    </div>

                                    <div class="form-group">
                                        <label for="emergencyContactEmail">Emergency Contact Email:</label>
                                        <input type="text" class="form-control" id="emergencyContactEmail">
                                    </div>

                                    <div class="form-group">
                                        <label for="emergencyContactRelationship">Emergency Contact Relationship:</label>
                                        <input type="text" class="form-control" id="emergencyContactRelationship">
                                    </div>

                                    <div class="form-group">
                                        <label for="EmergencyContactSpokenLanaguage">Emergency Contact Spoken Language:</label>
                                        <input type="text" class="form-control" id="EmergencyContactSpokenLanaguage">
                                    </div>

                                    <h3>Student Accepted On: </h3>
                                    <div id="acceptanceDate">
                                        <div class="input-group date">
                                            <input type="text" class="form-control" value="{{ $now }}">
                                            <div class="input-group-addon">
                                                <span class="glyphicon glyphicon-th"></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default">Submit</button>
                                </div>
                            </form>
                        </div> <!-- end. modal-content-->
                    </div> <!-- end .modal-dialog -->
                </div> <!-- end .modal fade -->

            </div> <!-- end .panel -->
        </div>
    </div>
</div>
@stop

@section('extra_js')
<script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
<script>
$('#dateOfBirth .date').datepicker({
    format: 'dd/mm/yyyy'
});

$('#courseCommencement .date').datepicker({
    format: 'dd/mm/yyyy'
});

$('#acceptanceDate .date').datepicker({
    format: 'dd/mm/yyyy'
});
</script>
@stop
