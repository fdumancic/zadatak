<?php

use Faker\Factory as Faker;
use Faker\Provider\Base;
use Faker\Provider\randomElement;
use Illuminate\Database\Seeder;


class TagNoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('Notebook\Notes_to_tags');

        for($i=1; $i<=10; $i++){

        	DB::table('notes_to_tags')->insert([
        		'note_id' => $faker->unique()->numberBetween($min = 1, $max = 10),
        		'tag_id' => $faker->numberBetween($min = 1, $max = 4),
        		'created_at' => \Carbon\Carbon::now(),
        		'created_at' => \Carbon\Carbon::now(),


        	]);
        }
        for($i=1; $i<=10; $i++){

        	DB::table('notes_to_tags')->insert([
        		'note_id' => $faker->numberBetween($min = 1, $max = 10),
        		'tag_id' => $faker->numberBetween($min = 1, $max = 4),
        		'created_at' => \Carbon\Carbon::now(),
        		'created_at' => \Carbon\Carbon::now(),


        	]);
        }


    }
}
