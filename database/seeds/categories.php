<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class categories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 100; $i++) {
            $string = str_random(40);
            $fakeArray = [
                'slug'        => 'url-'.$i,
                'name'        => 'name '.$i,
                'title'       => 'title '.$i,
                'description' => 'description '.$i,
                'body'        => 'Body '.$string . '...',
            ];
            DB::table('categories')->insert($fakeArray);
        }
    }
}
