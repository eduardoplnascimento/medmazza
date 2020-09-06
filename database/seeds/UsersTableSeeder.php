<?php

use Carbon\Carbon;
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
            'name'       => 'admin',
            'email'      => 'admin@teste.com',
            'type'       => 'admin',
            'password'   => Hash::make('123456'),
            'api_token'  => Str::random(80),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name'       => 'Dra. Adriana Galvão',
            'email'      => 'adrianagalvao@teste.com',
            'type'       => 'doctor',
            'image'      => '1.jpg',
            'password'   => Hash::make('123456'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name'       => 'Dr. Manoel Corte Real',
            'email'      => 'manoelcorte@teste.com',
            'type'       => 'doctor',
            'image'      => '2.jpg',
            'password'   => Hash::make('123456'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name'       => 'Dra. Cecília Nascimento',
            'email'      => 'cecilianascimento@teste.com',
            'type'       => 'doctor',
            'image'      => '3.jpg',
            'password'   => Hash::make('123456'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name'       => 'Dr. Matheus Novaes',
            'email'      => 'matheusnovaes@teste.com',
            'type'       => 'doctor',
            'image'      => '4.jpg',
            'password'   => Hash::make('123456'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name'       => 'Dra. Maria Conceição',
            'email'      => 'mariaconceicao@teste.com',
            'type'       => 'doctor',
            'image'      => '5.jpg',
            'password'   => Hash::make('123456'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name'       => 'Dr. Francisco Benício Cardoso',
            'email'      => 'franciscocardoso@teste.com',
            'type'       => 'doctor',
            'image'      => '6.jpg',
            'password'   => Hash::make('123456'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name'       => 'Eduardo Nascimento',
            'email'      => 'eduardonascimento@teste.com',
            'type'       => 'patient',
            'image'      => 'F6fMQY.jpeg',
            'password'   => Hash::make('123456'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
