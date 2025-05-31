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
        Role::create(['name_en' => 'Super-Admin', 'name_fa' => 'سوپر ادمین']);
        Role::create(['name_en' => 'Originator', 'name_fa' => 'موسس']);
        Role::create(['name_en' => 'Manager', 'name_fa' => 'مدیر']);
        Role::create(['name_en' => 'Assistant', 'name_fa' => 'منشی']);
        Role::create(['name_en' => 'Accountant', 'name_fa' => 'حسابدار']);
        Role::create(['name_en' => 'Teacher', 'name_fa' => 'مربی']);
        Role::create(['name_en' => 'Student', 'name_fa' => 'کارآموز']);
        Role::create(['name_en' => 'JobSeeker', 'name_fa' => 'کارجو']);
        Role::create(['name_en' => 'Examiner', 'name_fa' => 'آزمونگر']);
        Role::create(['name_en' => 'Marketer', 'name_fa' => 'بازاریاب']);
        Role::create(['name_en' => 'QuestionMaker', 'name_fa' => 'طراح سوال']);
        Role::create(['name_en' => 'QuestionAuditor', 'name_fa' => 'ممیز سوال']);

    }
}
