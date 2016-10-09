<?php

use Illuminate\Database\Seeder;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('type')->insert([
            [
                'typeId' => 'Core',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'typeId' => 'Major',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'typeId' => 'Co-Major',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'typeId' => 'Minor',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'typeId' => 'Elective',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
