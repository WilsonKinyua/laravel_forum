<?php

use App\Channel;
use Illuminate\Database\Seeder;

class ChannelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Channel::create([

            'name' => 'Laravel 7.1',
            'slug'=> Str::slug('Laravel 7 1', '-'),
            
        ]);

        Channel::create([

            'name' => 'Vue JS 3',
            'slug'=> Str::slug('Vue JS 3', '-'),
            
        ]);
        Channel::create([

            'name' => 'Angular 7',
            'slug'=> Str::slug('Angular 7', '-'),
            
        ]);
        Channel::create([

            'name' => 'NodeJs',
            'slug'=> Str::slug('Node Js' , '-'),
            
        ]);
    }
}
