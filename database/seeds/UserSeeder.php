<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
 
        DB::table('users')->insert([
            'name' => 'GonnaSolve',
            'description' => 'Akun seed GonnaSolve',
            'email' => 'admin@gonnasolve.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    	for($i = 1; $i <= 100; $i++){
    		DB::table('users')->insert([
                'name' => $faker->name,
                'description' => $faker->text,
                'email' => $faker->unique()->safeEmail,
                'email_verified_at' => now(),
                'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
    		]);
 
    	}
    }
}
