<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

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
            'id' => 1,
            'name'  => 'John',
            'email' => 'John@email.com',
            'phone' => '123',
            'password' => bcrypt('secret'),
            'type' => 'PREMIUM',
            'remember_token' => str_random(10),
            'api_token' => str_random(10),
            'created_at'   => date('Y-m-d H:i:s'),
            'updated_at'   => date('Y-m-d H:i:s')
        ]);
        
        DB::table('users')->insert([
            'id' => 2,
            'name'  => 'Bob',
            'email' => 'bob@email.com',
            'phone' => '333',
            'password' => bcrypt('secret'),
            'type' => 'PREMIUM',
            'remember_token' => str_random(10),
            'api_token' => str_random(10),
            'created_at'   => date('Y-m-d H:i:s'),
            'updated_at'   => date('Y-m-d H:i:s')
        ]);
        
        DB::table('users')->insert([
            'id' => 3,
            'name'  => 'Hilda',
            'email' => 'hilda@email.com',
            'phone' => '887',
            'password' => bcrypt('secret'),
            'type' => 'REGULER',
            'remember_token' => str_random(10),
            'api_token'     => str_random(10),
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s')
        ]);
    }
}
