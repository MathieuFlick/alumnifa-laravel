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
        $password = bcrypt('00000000');
        DB::table('students')->insert([
            'firstname' => 'Mathieu',
            'lastname' => 'Flick',
            'dob' => '1981-10-11'
        ]);
        
        DB::table('students')->insert([
                'firstname' => 'Thibault',
                'lastname' => 'Jamin',
                'dob' => '1987-05-27'
            ]);

        DB::table('students')->insert([
            'firstname' => 'Padilla',
            'lastname' => 'Hervé',
            'dob' => '1981-01-01'
        ]);

        DB::table('students')->insert([
            'firstname' => 'Ayed',
            'lastname' => 'Nizar',
            'dob' => '1975-04-16'
        ]);

        DB::table('users')->insert([
            'firstname' => 'Mathieu',
            'lastname' => 'Flick',
            'dob' => '1981-10-11',
            'email' => 'mathieuflick@gmail.com',
            'pseudo' => 'mathflick',
            'password' => $password
        ]);

        DB::table('users')->insert([
            'firstname' => 'Thibault',
            'lastname' => 'Jamin',
            'dob' => '1987-05-27',
            'email' => 'thibault.jamin@gmx.com',
            'pseudo' => 'thibjam',
            'password' => $password
        ]);

        DB::table('users')->insert([
            'firstname' => 'Padilla',
            'lastname' => 'Hervé',
            'dob' => '1981-01-01',
            'email' => 'hervepadilla@gmail.com',
            'pseudo' => 'herpadweb',
            'password' => $password
        ]);

        DB::table('users')->insert([
            'firstname' => 'Ayed',
            'lastname' => 'Nizar',
            'dob' => '1975-04-16',
            'email' => 'nizar.ayed@upgrade-code.org',
            'pseudo' => 'topniz',
            'password' => $password
        ]);
    }
}