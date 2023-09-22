<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class PermissionAssignUsers extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permission_assign_users')->delete();
        $data=DB::table('permissions')->get();
        foreach ($data as $p) { 
            DB::table('permission_assign_users')->insert(
              [   
              'user_id'        => 1,            
              'permission_id'   =>$p->id,
              'actions'           => "modify",                      
              'status'          => 'active',            
              ]);
        }
    }
}
