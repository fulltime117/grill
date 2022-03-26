<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OtherPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('other_pages')->insert([
            'policy' => 'Policy...',
            'product_supply' => 'product_supply',
            'cancellation' => 'cancellation',
            'business_responsibility' => 'responsibility...'
        ]);
    }
}
