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
        Role::create(['name_en' => 'Super-Admin', 'name_fa' => 'سوپر ادمین', 'created' => j_d_stamp_en()]);
        Role::create(['name_en' => 'Originator', 'name_fa' => 'موسس', 'created' => j_d_stamp_en()]);
        Role::create(['name_en' => 'Manager', 'name_fa' => 'مدیر', 'created' => j_d_stamp_en()]);
        Role::create(['name_en' => 'Assistant', 'name_fa' => 'منشی', 'created' => j_d_stamp_en()]);
        Role::create(['name_en' => 'Accountant', 'name_fa' => 'حسابدار', 'created' => j_d_stamp_en()]);
        Role::create(['name_en' => 'Teacher', 'name_fa' => 'مربی', 'created' => j_d_stamp_en()]);
        Role::create(['name_en' => 'Student', 'name_fa' => 'کارآموز', 'created' => j_d_stamp_en()]);
        Role::create(['name_en' => 'JobSeeker', 'name_fa' => 'کارجو', 'created' => j_d_stamp_en()]);
        Role::create(['name_en' => 'Examiner', 'name_fa' => 'آزمونگر', 'created' => j_d_stamp_en()]);
        Role::create(['name_en' => 'Marketer', 'name_fa' => 'بازاریاب', 'created' => j_d_stamp_en()]);
        Role::create(['name_en' => 'QuestionMaker', 'name_fa' => 'طراح سوال', 'created' => j_d_stamp_en()]);
        Role::create(['name_en' => 'QuestionAuditor', 'name_fa' => 'ممیز سوال', 'created' => j_d_stamp_en()]);

    }
}
