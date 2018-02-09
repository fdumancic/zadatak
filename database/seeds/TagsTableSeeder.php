<?php

use Faker\Factory as Faker;
use Faker\Provider\Base;
use Faker\Provider\randomElement;
use Illuminate\Database\Seeder;


class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\Tags');

        for($i=1; $i<=4; $i++){

        	DB::table('tags')->insert([
        		'tag' => $faker->unique()->randomElement(['PHP', 'HTML', 'JS', 'CSS']),
        		'created_at' => \Carbon\Carbon::now(),
        		'created_at' => \Carbon\Carbon::now(),

        	]);
        }
        


    }
}
