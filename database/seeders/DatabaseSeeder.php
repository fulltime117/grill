<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)->create();
        \App\Models\Category::factory(3)->create();
        \App\Models\Post::factory(6)->create();
        \App\Models\Tag::factory(5)->create();
        \App\Models\Course::factory(1)->create();
        \App\Models\Lesson::factory(6)->create();
        \App\Models\Question::factory(40)->create();
        
        $this->call(RoleSeeder::class);
        $this->call(RoleUserSeeder::class);
        $this->call(ContactusSeeder::class);
        $this->call(AboutusSeeder::class);
        $this->call(OtherPageSeeder::class);
        $this->call(HomePageSeeder::class);
        $this->call(TypeSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(BannerSeeder::class);
    }
}
