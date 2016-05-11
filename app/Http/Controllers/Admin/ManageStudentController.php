<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Carbon\Carbon;
use App\Student;

class ManageStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];

        // get today
        $now = Carbon::now()->format('d/m/Y');
        $data['now'] = $now;
        // TODO: Return all data to the view
        // return response()->json(Student::all());     // when ready, use this
        return view ('admin.managestudents', $data);           // temporary, use this
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // maybe its better to create a new view to add student?
        // otherwise, it feels weird to have both landing page and create page
        // on the same view. As a User, I feel weird
        return view ('admin.managestudents');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Gets input from form and create new instance in the database
        $input = $request->only([
            'title',
            'gender',
            'dateOfBirth',
            'surname',
            'givenName',
            'email',
            'overseasAddress',
            'overseasCountry',
            'malaysianAddress',
            'malaysianCountry',     // maybe extra here, confirm later
            'malaysianPostcode',
            'overseasTelephone',
            'malaysianTelephone',
            'fax',
            'mobile',
            'countryOfCitizenship',
            'birthCountry',
            'identityCardOrPassportNumber',
            'passportExpiry',
            'visaValidity',
            'visaType',
            'visaExpiry',
            'visaCollectionLoaction', // some typo, need to confirm later
            'courseAccepted1',
            'courseAccepted2',
            'courseAccepted3',
            'emergencyContactName',
            'emergencyContactAddress',
            'emergencyContactTelephone',
            'emergencyContactFax',
            'emergencyContactMobile',
            'emergencyContactRelationship',
            'emergencyContactSpokenLanaguage',  // another typo
            'acceptanceDate'
        ]);

        // create new student
        $student = new Student;
        $student->title = $input['title'];
        $student->gender = $input['gender'];
        $student->dateOfBirth = $input['dateOfBirth'];
        $student->surname = $input['surname'];
        $student->givenName = $input['givenName'];
        $student->email = $input['email'];
        $student->overseasAddress = $input['overseasAddress'];
        $student->overseasCountry = $input['overseasCountry'];
        $student->overseasPostcode = $input['overseasPostcode'];
        $student->malaysianAddress = $input['malaysianAddress'];
        $student->malaysianCountry = $input['malaysianCountry'];
        $student->malaysianPostcode = $input['malaysianPostcode'];
        $student->overseasTelephone = $input['overseasTelephone'];
        $student->malaysianTelephone = $input['malaysianTelephone'];
        $student->fax = $input['fax'];
        $student->mobile = $input['mobile'];
        $student->countryOfCitizenship = $input['countryOfCitizenship'];
        $student->birthCountry = $input['birthCountry'];
        $student->identityCardOrPassportNumber = $input['identityCardOrPassportNumber'];
        $student->passportExpiry = $input['passportExpiry'];
        $student->visaValidity = $input['visaValidity'];
        $student->visaType = $input['visaType'];
        $student->visaExpiry = $input['visaExpiry'];
        $student->visaCollectionLoaction = $input['visaCollectionLoaction'];
        $student->courseAccepted1 = $input['courseAccepted1'];
        $student->courseAccepted2 = $input['courseAccepted2'];
        $student->courseAccepted3 = $input['courseAccepted3'];
        $student->courseCommencement = $input['courseCommencement'];
        $student->emergencyContactName = $input['emergencyContactName'];
        $student->emergencyContactAddress = $input['emergencyContactAddress'];
        $student->emergencyContactTelephone = $input['emergencyContactTelephone'];
        $student->emergencyContactFax = $input['emergencyContactFax'];
        $student->emergencyContactMobile = $input['emergencyContactMobile'];
        $student->emergencyContactEmail = $input['emergencyContactEmail'];
        $student->emergencyContactRelationship = $input['emergencyContactRelationship'];
        $student->EmergencyContactSpokenLanaguage = $input['EmergencyContactSpokenLanaguage'];
        $student->acceptanceDate = $input['acceptanceDate'];

        // save into database
        $student->save();
        return response()->json($student);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Student::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view ('admin.managestudents', ['admin.managestudents' => Student::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->only([
            'title',
            'gender',
            'dateOfBirth',
            'surname',
            'givenName',
            'email',
            'overseasAddress',
            'overseasCountry',
            'malaysianAddress',
            'malaysianCountry',     // maybe extra here, confirm later
            'malaysianPostcode',
            'overseasTelephone',
            'malaysianTelephone',
            'fax',
            'mobile',
            'countryOfCitizenship',
            'birthCountry',
            'identityCardOrPassportNumber',
            'passportExpiry',
            'visaValidity',
            'visaType',
            'visaExpiry',
            'visaCollectionLoaction',// some typo, need to confirm later
            'courseAccepted1',
            'courseAccepted2',
            'courseAccepted3',
            'emergencyContactName',
            'emergencyContactAddress',
            'emergencyContactTelephone',
            'emergencyContactFax',
            'emergencyContactMobile',
            'emergencyContactRelationship',
            'emergencyContactSpokenLanaguage',
            'acceptanceDate'
        ]);

        // create new student
        $student = Student::findOrFail($id);
        $student->title = $input['title'];
        $student->gender = $input['gender'];
        $student->dateOfBirth = $input['dateOfBirth'];
        $student->surname = $input['surname'];
        $student->givenName = $input['givenName'];
        $student->email = $input['email'];
        $student->overseasAddress = $input['overseasAddress'];
        $student->overseasCountry = $input['overseasCountry'];
        $student->overseasPostcode = $input['overseasPostcode'];
        $student->malaysianAddress = $input['malaysianAddress'];
        $student->malaysianCountry = $input['malaysianCountry'];
        $student->malaysianPostcode = $input['malaysianPostcode'];
        $student->overseasTelephone = $input['overseasTelephone'];
        $student->malaysianTelephone = $input['malaysianTelephone'];
        $student->fax = $input['fax'];
        $student->mobile = $input['mobile'];
        $student->countryOfCitizenship = $input['countryOfCitizenship'];
        $student->birthCountry = $input['birthCountry'];
        $student->identityCardOrPassportNumber = $input['identityCardOrPassportNumber'];
        $student->passportExpiry = $input['passportExpiry'];
        $student->visaValidity = $input['visaValidity'];
        $student->visaType = $input['visaType'];
        $student->visaExpiry = $input['visaExpiry'];
        $student->visaCollectionLoaction = $input['visaCollectionLoaction'];
        $student->courseAccepted1 = $input['courseAccepted1'];
        $student->courseAccepted2 = $input['courseAccepted2'];
        $student->courseAccepted3 = $input['courseAccepted3'];
        $student->courseCommencement = $input['courseCommencement'];
        $student->emergencyContactName = $input['emergencyContactName'];
        $student->emergencyContactAddress = $input['emergencyContactAddress'];
        $student->emergencyContactTelephone = $input['emergencyContactTelephone'];
        $student->emergencyContactFax = $input['emergencyContactFax'];
        $student->emergencyContactMobile = $input['emergencyContactMobile'];
        $student->emergencyContactEmail = $input['emergencyContactEmail'];
        $student->emergencyContactRelationship = $input['emergencyContactRelationship'];
        $student->EmergencyContactSpokenLanaguage = $input['EmergencyContactSpokenLanaguage'];
        $student->acceptanceDate = $input['acceptanceDate'];

        $student->save();
        return response()->json($student);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return response()->json($student);
    }
}
