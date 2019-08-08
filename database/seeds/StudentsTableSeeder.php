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
            'firstname' => 'Hervé',
            'lastname' => 'Padilla',
            'dob' => '1981-01-01'
        ]);

        DB::table('students')->insert([
            'firstname' => 'Nizar',
            'lastname' => 'Ayed',
            'dob' => '1975-04-16'
        ]);

        DB::table('students')->insert([
            'firstname' => 'Maryna',
            'lastname' => 'Dubois',
            'dob' => '1984-06-14'
        ]);

        DB::table('students')->insert([
            'firstname' => 'Philippe',
            'lastname' => 'Duquesne',
            'dob' => '1965-07-13'
        ]);

        DB::table('students')->insert([
            'firstname' => 'Jean',
            'lastname' => 'Dupont',
            'dob' => '1962-11-19'
        ]);

        DB::table('students')->insert([
            'firstname' => 'Pierre',
            'lastname' => 'Dupont',
            'dob' => '1985-02-04'
        ]);

        DB::table('students')->insert([
            'firstname' => 'Kylian',
            'lastname' => 'Mbappé',
            'dob' => '1998-12-20'
        ]);

        DB::table('students')->insert([
            'firstname' => 'Isabelle',
            'lastname' => 'Hiks',
            'dob' => '1975-04-30'
        ]);

        DB::table('users')->insert([
            'firstname' => 'Mathieu',
            'lastname' => 'Flick',
            'dob' => '1981-10-11',
            'email' => 'mathieuflick@gmail.com',
            'pseudo' => 'mathflick',
            'password' => $password,
            'formation' => 'Développeur Web',
            'promo' => '2019',
            'company' => 'IFA',
            'post' => 'Étudiant',
            'admin' => 1
            'avatar' => 'http://alumnifa.local/storage/avatars/1.jpg'
        ]);

        DB::table('users')->insert([
            'firstname' => 'Thibault',
            'lastname' => 'Jamin',
            'dob' => '1987-05-27',
            'email' => 'thibault.jamin@gmx.com',
            'pseudo' => 'thibjam',
            'password' => $password,
            'formation' => 'Développeur Web',
            'promo' => '2019',
            'company' => 'IFA',
            'post' => 'Étudiant',
            'avatar' => 'http://alumnifa.local/storage/avatars/2.jpg'
        ]);

        DB::table('users')->insert([
            'firstname' => 'Hervé',
            'lastname' => 'Padilla',
            'dob' => '1981-01-01',
            'email' => 'hervepadilla@ifa.com',
            'pseudo' => 'herpadweb',
            'password' => $password,
            'formation' => 'Communication Marketing',
            'promo' => '2004',
            'company' => 'IFA',
            'post' => 'Directeur général'
            'avatar' => 'http://alumnifa.local/storage/avatars/3.jpg'
        ]);

        DB::table('users')->insert([
            'firstname' => 'Nizard',
            'lastname' => 'Ayed',
            'dob' => '1975-04-16',
            'email' => 'nizar.ayed@upgrade-code.org',
            'pseudo' => 'topniz',
            'password' => $password,
            'formation' => 'Communication Marketing',
            'promo' => '1998',
            'company' => 'Upgrade Code',
            'post' => 'Directeur général',
            'avatar' => 'http://alumnifa.local/storage/avatars/4.jpg'
        ]);

        DB::table('users')->insert([
            'firstname' => 'Maryna',
            'lastname' => 'Dubois',
            'dob' => '1984-06-14',
            'email' => 'marynadubois@gmail.com',
            'pseudo' => 'maridu',
            'password' => $password,
            'formation' => 'Communication Marketing',
            'promo' => '2006',
            'company' => 'Loréal',
            'post' => 'Responsable communication',
            'avatar' => 'http://alumnifa.local/storage/avatars/5.jpg'
        ]);

        DB::table('users')->insert([
            'firstname' => 'Philippe',
            'lastname' => 'Duquesne',
            'dob' => '1965-07-13',
            'email' => 'philippeduquesne@gmail.com',
            'pseudo' => 'phildu',
            'password' => $password,
            'formation' => 'Ressources Humaines',
            'promo' => '1988',
            'company' => 'Les Deschiens',
            'post' => 'Comédien',
            'avatar' => 'http://alumnifa.local/storage/avatars/6.jpg'
        ]);

        DB::table('users')->insert([
            'firstname' => 'Jean',
            'lastname' => 'Dupont',
            'dob' => '1962-11-19',
            'email' => 'jeandupont@dupontlajoie.com',
            'pseudo' => 'dubonjean',
            'password' => $password,
            'formation' => 'Communication Marketing',
            'promo' => '1985',
            'company' => 'Dupont & Lajoie',
            'post' => 'Président',
            'avatar' => 'http://alumnifa.local/storage/avatars/7.jpg'
        ]);

        DB::table('users')->insert([
            'firstname' => 'Pierre',
            'lastname' => 'Dupont',
            'dob' => '1985-02-04',
            'email' => 'pierredupont@dupontlajoie.com',
            'pseudo' => 'pierredup',
            'password' => $password,
            'formation' => 'Communication Marketing',
            'promo' => '2010',
            'company' => 'Dupont & Lajoie',
            'post' => 'Chef de projet',
            'avatar' => 'http://alumnifa.local/storage/avatars/8.jpg'
        ]);

        DB::table('users')->insert([
            'firstname' => 'Kylian',
            'lastname' => 'Mbappé',
            'dob' => '1998-12-20',
            'email' => 'kylianmbappe@gmail.com.com',
            'pseudo' => 'KMB7',
            'password' => $password,
            'formation' => 'Ressources Humaines',
            'promo' => '2016',
            'company' => 'Paris Saint-Germain',
            'post' => 'Footballer',
            'avatar' => 'http://alumnifa.local/storage/avatars/9.jpg'
        ]);
    }
}