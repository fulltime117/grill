<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banners')->insert([
            'type' => 'course',
            'banner' => '/front-assets/images/default/course_banner.jpg',
            'title' => 'קוּרס',
        ],[
            'type' => 'post',
            'banner' => '/front-assets/images/default/post_banner.jpg',
            'title' => 'קוּרס',
        ],
        );
    }
}
