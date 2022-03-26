<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomePageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('homepages')->insert([[
                'type' => 'welcome1',
                'title' => 'welcome1',
                'image' => '/front-assets/images/default/baner1.png',
            ],[
                'type' => 'welcome2',
                'title' => 'welcome2',
                'image' => '/front-assets/images/default/baner2.png',
            ],[
                'type' => 'course',
                'title' => 'course',
                'image' => '',
            ],[
                'type' => 'why',
                'title' => 'why',
                'image' => '/front-assets/images/default/why.png',
            ],[
                'type' => 'partner1',
                'title' => 'partner1',
                'image' => '/front-assets/images/default/partner1.jpg',
            ],[
                'type' => 'partner2',
                'title' => 'partner2',
                'image' => '/front-assets/images/default/partner2.jpg',
            ],[
                'type' => 'partner3',
                'title' => 'partner3',
                'image' => '/front-assets/images/default/partner3.jpg',
            ],[
                'type' => 'partner4',
                'title' => 'partner4',
                'image' => '/front-assets/images/default/partner4.jpg',
            ],[
                'type' => 'post',
                'title' => 'post',
                'image' => '',
            ], [
                'type' => 'footer_logo',
                'title' => '',
                'image' => '',
            ]
        ]);
        
        
        DB::table('contract_content')->insert([
            'content' => 'contract content'
        ]);
        
    }
}
