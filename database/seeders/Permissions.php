<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class Permissions extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permissions')->delete();
        DB::table('permissions')->insert(
            [
                [
                    'id'              => 1,
                    'name'            => 'Dashboard',
                    'key'             => 'dashboard',
                    'parent_menu_id'  => 'no',
                    'route'           => "admin.dashboard",
                    'sub_route'       => "admin.dashboard,admin.settings,admin.setting-edit,admin.editProfile",
                    'icon'            => "mdi mdi-briefcase-account-outline",
                    'priority'        => 1,
                    'status'          => 'active',
                ],       
                [
                    'id'              => 2,
                    'name'            => 'Service Engineers',
                    'key'             => 'service_engineers',
                    'parent_menu_id'  => 'no',
                    'route'           => "service-engineers.index",
                    'sub_route'       => "service-engineers.index,service-engineers.create,service-engineers.show",
                    'icon'            => "mdi mdi-account",
                    'priority'        => 12,
                    'status'          => 'active',
                ],
            ]
            );
    }
}
