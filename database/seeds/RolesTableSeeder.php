<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Faker\Factory;
use App\Models\Permission;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $roles = [
            [
                'name' => 'Super Admin',
                'slug' => 'super-admin',
                'detail' => 'Super Admin can access all permission/method/service',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'name' => 'Member',
                'slug' => 'member',
                'detail' => 'Member admin can access specific permission/method/service ',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]
        ];
        DB::table('roles')->insert($roles);

        $permissions = Permission::where('allowed',1)->get();
        foreach ($permissions as $permission){
            $data['permission_id'] = $permission->id;
            $data['role_id'] = 1;
            DB::table('permission_role')->insert($data);
        }
    }
}
