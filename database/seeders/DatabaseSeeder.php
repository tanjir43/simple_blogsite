<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Banner;
use App\Models\SiteSetting;
use App\Models\Social;
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
         SiteSetting::insert([
            'email' => 'newsportal@gmail.com',
            'phone' => '0123456789',
            'alt_phone' => '1234567890',
            'address'   => '16/6,East Garden road',
            'office_hour'=> 'Mon-Sat: 9:00 AM - 7:00 PM'

         ]);

         Social::insert([
            'facebook' => 'https://www.facebook.com/Tanjir.islam.140/',
         ]); 
         Banner::insert([
            'title'           => 'New banner',
            'banner_content'  => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore velit porro nisi fuga amet. Ab facilis quis praesentium? Ex, cumque!',
            'image'           => 'front_assets/img/banner/banner_2.png',
            'link_title'      => 'Set title',
            'link_url'        => 'www.facebook.com',
            'priority'        => '1',
            'status'          => 'active'
           
         ]);   

    }
}
