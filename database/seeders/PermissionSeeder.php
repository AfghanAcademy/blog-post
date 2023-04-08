<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name'=>'post view']);
        Permission::create(['name'=>'post create']);
        Permission::create(['name'=>'post update']);
        Permission::create(['name'=>'post delete']);

        Permission::create(['name'=>'user view']);
        Permission::create(['name'=>'user create']);
        Permission::create(['name'=>'user update']);
        Permission::create(['name'=>'user delete']);


    }
}
