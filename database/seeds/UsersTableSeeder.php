<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Faker\Factory;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'email' => 'dev2@skill.jobs',
                'mobile' => '01674797580',
                'username' => 'milton',
                'identical' => '201610455',
                'name' => 'Muhammad Siddiqur Rahman',
                'avatar' => 'milton.jpg',
                'password' => Hash::make('123456'),
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'email' => 'general@gmail.com',
                'mobile' => '0123456789',
                'username' => 'general',
                'identical' => '12345678',
                'name' => 'General Admin',
                'avatar' => 'avatar2.png',
                'password' => Hash::make('123456'),
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]
        ];
        DB::table('users')->insert($user);

        $roleUser = [
            [
                'role_id' => 1,
                'user_id' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'role_id' => 2,
                'user_id' => 2,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]
        ];
        DB::table('role_user')->insert($roleUser);
    }
}
