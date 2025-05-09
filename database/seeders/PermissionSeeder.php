<?php

namespace Database\Seeders;

use http\Client\Curl\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        // Create Roles
        $sar = Role::create(['name' => 'Super-Admin']);
        $sau = \App\Models\User::factory()->create(['user_name' => 'YasserSa', 'password' => '123456789']);
        $sau -> assignRole($sar);


        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Originator']);
        Role::create(['name' => 'Manager']);
        Role::create(['name' => 'Assistant']);
        Role::create(['name' => 'Accountant']);
        Role::create(['name' => 'Teacher']);
        Role::create(['name' => 'Student']);
        Role::create(['name' => 'JobSeeker']);
        Role::create(['name' => 'Examiner']);
        Role::create(['name' => 'NewComer']);
        Role::create(['name' => 'Marketer']);
        Role::create(['name' => 'QuestionMaker']);
        Role::create(['name' => 'QuestionAuditor']);
    }
}
