<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('aboutuses')->insert([
            'banner' => '/front-assets/images/default/aboutus.png',
            'banner_title' => ' עלינו ',
            'image' => '/front-assets/images/default/aboutus.png',
            'title' => 'גרילמן קו לי & כיתת גריל',
            'body' => 'content...',
        ]);
    }
}
