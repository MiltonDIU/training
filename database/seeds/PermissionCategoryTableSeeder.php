<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Carbon\Carbon;
class PermissionCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissionCategory = [
           [
                'name' => 'Dashboard',//1
                'slug' => 'dashboard',
                'detail' =>'This Category using for only Dashboard Access',
                'is_active' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'name' => 'Permission Category',//1
                'slug' => 'permission category',
                'detail' =>'This Category using for only Permission Category Access',
                'is_active' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'name' => 'Permission',//1
                'slug' => 'permission',
                'detail' =>'This Category using for only Permission Access',
                'is_active' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'name' => 'Roles',//1
                'slug' => 'roles',
                'detail' =>'This Category using for only Permission Roles Access',
                'is_active' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'name' => 'Users',//1
                'slug' => 'users',
                'detail' =>'This Category using for only Permission Users Access',
                'is_active' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'name' => 'Settings',//1
                'slug' => 'settings',
                'detail' =>'This Category using for only Application Settings',
                'is_active' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'name' => 'Categories',//1
                'slug' => 'categories',
                'detail' =>'This Category using for only Course/Workshop Categories',
                'is_active' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'name' => 'Teachers',//1
                'slug' => 'teachers',
                'detail' =>'This Category using for only Teachers',
                'is_active' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'name' => 'Venue',//1
                'slug' => 'venue',
                'detail' =>'This Category using for only Venue',
                'is_active' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'name' => 'Courses',//1
                'slug' => 'courses',
                'detail' =>'This Category using for only Courses',
                'is_active' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'name' => 'CoursesBatchEnroll',//1
                'slug' => 'courses-batch-enroll',
                'detail' =>'This Category using for only Courses Batch Enroll',
                'is_active' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'name' => 'Program Type',//1
                'slug' => 'program-type',
                'detail' =>'This Category using for only program type',
                'is_active' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'name' => 'Program',//1
                'slug' => 'program',
                'detail' =>'This Program using for only Courses Enroll',
                'is_active' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'name' => 'Program Enroll',//1
                'slug' => 'program-enroll',
                'detail' =>'This Category using for only Program Enroll',
                'is_active' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'name' => 'Batches',//1
                'slug' => 'batches',
                'detail' =>'This Category using for only Batches',
                'is_active' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'name' => 'Allocation',//1
                'slug' => 'allocation',
                'detail' =>'Course, Batch, Venue, Teacher Allocation',
                'is_active' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],

        ];
        DB::table('permission_categories')->insert($permissionCategory);
    }
}
