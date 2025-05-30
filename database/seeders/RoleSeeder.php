<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name_en' => 'Super-Admin']);
        Role::create(['name_en' => 'Admin']);
        Role::create(['name_en' => 'Originator']);
        Role::create(['name_en' => 'Assistant']);
        Role::create(['name_en' => 'Assistant']);
        Role::create(['name_en' => 'Accountant']);
        Role::create(['name_en' => 'Teacher']);
        Role::create(['name_en' => 'Student']);
        Role::create(['name_en' => 'JobSeeker']);
        Role::create(['name_en' => 'Examiner']);
        Role::create(['name_en' => 'Marketer']);
        Role::create(['name_en' => 'QuestionMaker']);
        Role::create(['name_en' => 'QuestionAuditor']);

    }
}
