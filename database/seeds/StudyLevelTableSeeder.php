<?php

use Illuminate\Database\Seeder;

class StudyLevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('study_level')->insert([
            [
                'studyLevel' => 'Foundation'
            ],
            [
                'studyLevel' => 'Degree'
            ],
            [
                'studyLevel' => 'Master'
            ]
        ]);
    }
}
