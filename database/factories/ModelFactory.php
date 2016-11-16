<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'username' => $faker->username,
        'email' => '123456@email.com',
        'permissionLevel' => '1',
        'password' => bcrypt('123456'),
    ];
});

$factory->define(App\CoordinatorUnit::class, function (Faker\Generator $faker) {
    return [
        'username' => 'coordinator_cs',
        'unitCode' => 'HIT3315'
    ];
});

$factory->define(App\CourseCoordinator::class, function (Faker\Generator $faker) {
    return [
        'username' => 'coordinator_cs',
        'courseCode' => $faker->postcode,
        'name' => $faker->name
    ];
});

// only need the phase for checking (if needed)
$factory->define(App\Config::class, function (Faker\Generator $faker) {
    return [
        'id' => 'enrolmentPhase',
        'value' => '1',
    ];
});

$factory->define(App\Course::class, function (Faker\Generator $faker) {
    return [
        'courseCode' => $faker->postcode,
        'courseName' => $faker->name,
        'semestersPerYear' => 3,
        'semesterCount' => 7,
        'studyLevel' => 'Degree'
    ];
});

$factory->define(App\EnrolmentDates::class, function (Faker\Generator $faker) {
    return [
        'year' => 2016,
        'level' => 'Degree',
        'term' => 'Semester 2',
        'reenrolmentOpenDate' => '2016-01-01',
        'reenrolmentCloseDate' => '2016-02-01',
        'shortCommence' => '2016-05-01',
        'longCommence' => '2016-06-15',
        'examResultsRelease' => '2016-06-01'
    ];
});

$factory->define(App\EnrolmentIssues::class, function (Faker\Generator $faker) {
    return [
        'id' => 1,
        'issueType' => 'Course Transfer',
    ];
});

$factory->define(App\EnrolmentUnits::class, function (Faker\Generator $faker) {
    return [
        'studentID' => $faker->postcode,
        'unitCode' => $faker->firstNameMale,
        'year' => 2016,
        'semester' => 'Semester 1',
        'semesterLength' => 'long',
        'status' => 'pending',
        'result' => 0.00,
        'grade' => 'ungraded'
    ];
});

$factory->define(App\GraduationRequirements::class, function (Faker\Generator $faker) {
    return [
        'courseCode' => 'I047',
        'unitType' => 'Core',
        'unitCount' => '20',
    ];
});

$factory->define(App\Requisite::class, function (Faker\Generator $faker) {
    return [
        'unitCode' => 'PRG0',
        'requisite' => 'COMPA',
        'type' => 'prerequisite 2',
        'index' => 0
    ];
});

$factory->define(App\StudentEnrolmentIssues::class, function (Faker\Generator $faker) {
    return [
        "studentID" => "123456",
        "issueID" => 1,
        "status" => "pending",
        "submissionData" => "{\"yearOfRequestedTransfer\":\"2016\",\"fromProgramCode\":\"I047\",\"fromProgramTitle\":\"Bachelor of Computer Science\",\"fromProgramIntakeYear\":\"2016\",\"toProgramCode\":\"B123\",\"toProgramTitle\":\"Business\",\"toProgramYear\":\"2016\",\"toReasons\":\"Sample to go Business\"}",
        "attachmentData" => ""
    ];
});

$factory->define(App\Student::class, function (Faker\Generator $faker) {
    return [
        'studentID' => $faker->postcode,
        'courseCode' => 'I047',
        'surname' => $faker->name,
        'givenName' => $faker->name,
        'year' => '2016',
        'term' => 'Semester 1',
    ];
});

$factory->define(App\StudyLevel::class, function (Faker\Generator $faker) {
    return [
        'studyLevel' => 'Degree'
    ];
});

$factory->define(App\StudyPlanner::class, function (Faker\Generator $faker) {
    return [
        'unitCode' => $faker->postcode,
        'courseCode' => $faker->postcode,
        'unitType' => 'Core',
        'year' => 2016,
        'semester' => 'Semester 1',
        'enrolmentTerm' => '0'
    ];
});

$factory->define(App\Type::class, function (Faker\Generator $faker) {
    return [
        'typeId' => 'Core'
    ];
});

$factory->define(App\UnitListing::class, function (Faker\Generator $faker) {
    return [
        'unitCode' => $faker->postcode,
        'year' => 2016,
        'semester' => 'Semester 1',
        'semesterLength' => 'long'
    ];
});

$factory->define(App\Unit::class, function (Faker\Generator $faker) {
    return [
        'unitCode' => $faker->firstNameMale,
        'unitName' => $faker->name,
        'creditPoints' => '0',
        'studyLevel' => 'Degree'
    ];
});

$factory->define(App\UnitType::class, function (Faker\Generator $faker) {
    return [
        'unitType' => 'Core',
    ];
});

// eduversal
$factory->define(App\ExamUnit::class, function (Faker\Generator $faker) {
    return [
        'studentID' => $faker->firstNameMale,
        'unitCode' => $faker->postcode,
        'grade' => 'pass'
    ];
});

$factory->define(App\StudentRecord::class, function (Faker\Generator $faker) {
    return [
        'studentID' => $faker->postcode,
        'surname' => $faker->name,
        'givenName' => $faker->firstNameMale,
        'courseCode' => 'I047',
        'year' => 2016,
        'term' => 'Semester 1',
        'paymentStatus' => 'paid'
    ];
});
