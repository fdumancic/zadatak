<?php

use Faker\Factory as Faker;
use Faker\Provider\Base;
use Faker\Provider\randomElement;
use Illuminate\Database\Seeder;


class NotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('Notebook\Notes');

        for($i=1; $i<=10; $i++){

        	DB::table('notes')->insert([
        		'user_id' => $faker->numberBetween($min = 1, $max = 3),
        		'title' => $faker->sentence,
        		'note' => implode($faker->paragraphs(1)),
        		'type' => $faker->randomElement(['private','public']),
        		'created_at' => \Carbon\Carbon::now(),
        		'created_at' => \Carbon\Carbon::now(),


        	]);
        }
    }
}
