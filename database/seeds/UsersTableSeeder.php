<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'     => 'admin',
            'email'    => 'admin@teste.com',
            'type'     => 'admin',
            'password' => Hash::make('123456'),
        ]);
        DB::table('users')->insert([
            'name'     => 'Dra. Adriana Galvão',
            'email'    => 'adrianagalvao@teste.com',
            'type'     => 'doctor',
            'password' => Hash::make('123456'),
        ]);
        DB::table('users')->insert([
            'name'     => 'Dr. Manoel Corte Real',
            'email'    => 'manoelcorte@teste.com',
            'type'     => 'doctor',
            'password' => Hash::make('123456'),
        ]);
        DB::table('users')->insert([
            'name'     => 'Dra. Cecília Nascimento',
            'email'    => 'cecilianascimento@teste.com',
            'type'     => 'doctor',
            'password' => Hash::make('123456'),
        ]);
        DB::table('users')->insert([
            'name'     => 'Dr. Matheus Novaes',
            'email'    => 'matheusnovaes@teste.com',
            'type'     => 'doctor',
            'password' => Hash::make('123456'),
        ]);
        DB::table('users')->insert([
            'name'     => 'Dra. Maria Conceição',
            'email'    => 'mariaconceicao@teste.com',
            'type'     => 'doctor',
            'password' => Hash::make('123456'),
        ]);
        DB::table('users')->insert([
            'name'     => 'Dr. Francisco Benício Cardoso',
            'email'    => 'franciscocardoso@teste.com',
            'type'     => 'doctor',
            'password' => Hash::make('123456'),
        ]);
    }
}
