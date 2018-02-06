<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('tags')->insert([
            'tag' => 'PHP',
            'created_at' => now(),
        ]);


        DB::table('tag_note')->insert([
        	'tag_id' => '1',
        	'note_id' => '1',
            'created_at' => now(),

        ]);

    }
}
