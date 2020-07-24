<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
 
    	for($i = 1; $i <= 100; $i++){
    		DB::table('answers')->insert([
                'answer_status' => 'created',
                'answer_content' => $faker->paragraph($nbSentences = 10, $variableNbSentences = true),
                'answer_author' => $faker->numberBetween(1,100),
                'question_id' => $faker->numberBetween(1,100),
                'created_at' => now(),
                'updated_at' => now(),
    		]);
 
    	}
    }
}
