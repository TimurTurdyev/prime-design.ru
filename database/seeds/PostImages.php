<?php

use Illuminate\Database\Seeder;

class PostImages extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 5; $i++) {
            $string = str_random(40);
            DB::table('post_images')->insert([
                'post_id' => 1,
                'image' => $string . '.png',
            ]);
        }
    }
}
