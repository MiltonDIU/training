<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            [
                'title' => 'User Management',
                'meta' => 'user management, laravel, role management,acl for laravel, multilevel user, multilevel route pre-fix,authorization,access level for laravel',
                'keyword' => 'user management, laravel, role management,acl for laravel, multilevel user, multilevel route pre-fix,authorization,access level for laravel',
                'mobile' => '01674797580',
                'email' => 'milton2913@gmail.com',
                'logo' => 'logo.jpg',
                'logo_alt' => 'Logo',
                'address' => 'Dhamrai,Dhaka-1943',
                'copy_right' => 'Copyright © 2018 <a href="http://mdmilton.com/" target="_blank">Md.Milton</a>. All Rights Reserved. ',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]
        ];
        DB::table('settings')->insert($settings);
        $days = [
            [
                'name' => 'Saturday',
                'slug' => 'saturday',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'name' => 'Sunday',
                'slug' => 'sunday',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'name' => 'Monday',
                'slug' => 'monday',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'name' => 'Tuesday',
                'slug' => 'tuesday',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'name' => 'Wednesday',
                'slug' => 'wednesday',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'name' => 'Thursday',
                'slug' => 'thursday',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'name' => 'Friday',
                'slug' => 'friday',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]

        ];
        DB::table('days')->insert($days);

    }
}
