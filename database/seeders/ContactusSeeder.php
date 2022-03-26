<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contactuses')->insert([
            'email' => 'info@grillman.com',
            'phone' => '+972424474763',
            'address' => 'rotchild 72, rishon lezion',
            'business' => 'Grilman@media.com',
            'image' => '/front-assets/images/default/contactus.png',
            'po' => '... P.O.'
        ]);
    }
}
