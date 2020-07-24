<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class QuestionSeeder extends Seeder
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
    		DB::table('questions')->insert([
                'question_status' => 'created',
                'question_title' => $faker->text,
                'question_content' => $faker->paragraph($nbSentences = 10, $variableNbSentences = true),
                'question_author' => $faker->numberBetween(1,100),
                'topic_id' => $faker->numberBetween(1,100),
                'created_at' => now(),
                'updated_at' => now(),
    		]);
 
    	}
    }
}
