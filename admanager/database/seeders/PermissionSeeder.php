<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::generateFor('clients');
        Permission::generateFor('bannieres');
        Permission::generateFor('campagnes');
        Permission::generateFor('roles');
        Permission::generateFor('users');
    }
}
