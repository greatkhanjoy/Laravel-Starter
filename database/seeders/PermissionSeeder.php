<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'edit posts']);
        Permission::create(['name' => 'edit post']);
        Permission::create(['name' => 'add post']);
        Permission::create(['name' => 'delete posts']);
        Permission::create(['name' => 'delete post']);
    }
}
