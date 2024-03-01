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
        Permission::generateFor('categories');
        Permission::generateFor('inscrits');
        Permission::generateFor('posts');
        Permission::generateFor('roles');
        Permission::generateFor('users');
    }
}
