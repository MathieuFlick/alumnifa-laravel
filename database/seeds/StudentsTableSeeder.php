<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            'firstname' => 'Mathieu',
            'lastname' => 'Flick',
            'dob' => '1981-10-11'
        ]);
    }
}
