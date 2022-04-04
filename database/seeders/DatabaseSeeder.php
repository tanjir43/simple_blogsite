<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Theme;
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
        // \App\Models\User::factory(10)->create();
        Admin::insert([
                'name' => 'Admin',
                'email'=> 'admin@gmail.com',
                'password'=> bcrypt('password'),
        ]);

        Admin::insert([
            'name' => 'AdminUser',
            'email'=> 'admin2@gmail.com',
            'password'=> bcrypt('password'),
         ]);

         Theme::insert([
            'website_name' => 'News portal',
            'website_tagline' => 'Inspire the next',
            'logo'      => 'front_assets/img/logos/logo.png',
            'favicon'   => 'front_assets/img/logos/favicon.png'
         ]);

    }
}
