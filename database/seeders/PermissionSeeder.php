<?php

namespace Database\Seeders;

use App\Models\Mobile;
use App\Models\Profile;
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

        $profile = new Profile();
        $profile ['n_code'] = 2063531218;
        $profile ['f_name_fa'] = 'یاسر';
        $profile ['l_name_fa'] = 'بیشه سری';
        $profile ['created'] = j_d_stamp_en();
        $profile->user()->associate($sau);
        $profile->save();

        $mobile = new Mobile();
        $mobile ['mobile_nu'] = '09177755924';
        $mobile ['verified'] = 1;
        $mobile ['created'] = j_d_stamp_en();
        $mobile->save();
        $sau->mobiles()->attach($mobile['id'], ['created' => j_d_stamp_en()]);


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
