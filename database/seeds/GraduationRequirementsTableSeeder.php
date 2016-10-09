<?php

use Illuminate\Database\Seeder;

class GraduationRequirementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('graduation_requirements')->insert([
            [
                'courseCode' => 'I047',
                'unitType' => 'Core',
                'unitCount' => '20',
            ],
            [
                'courseCode' => 'I047',
                'unitType' => 'Elective',
                'unitCount' => '4',
            ]
        ]);
    }
}
