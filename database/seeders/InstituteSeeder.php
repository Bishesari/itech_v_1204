<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Institute;
use Illuminate\Database\Seeder;

class InstituteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $institute = Institute::create(['short_name' => 'آی تک', 'full_name' => 'آموزشگاه آی تک', 'abb' => 'ITC','created' => j_d_stamp_en()]);
        $classroom = new Classroom(['name' => 'سایت A', 'capacity'=>16, 'active'=>1, 'created'=>j_d_stamp_en()]);
        $institute -> classrooms()->save($classroom);
        $classroom = new Classroom(['name' => 'سایت B', 'capacity'=>12, 'active'=>1, 'created'=>j_d_stamp_en()]);
        $institute -> classrooms()->save($classroom);

        $institute = Institute::create(['short_name' => 'فنی کو', 'full_name' => 'آموزشگاه فنی کو', 'abb' => 'FNI','created' => j_d_stamp_en()]);
        $classroom = new Classroom(['name' => 'سایت A', 'capacity'=>18, 'active'=>1, 'created'=>j_d_stamp_en()]);
        $institute -> classrooms()->save($classroom);
        $classroom = new Classroom(['name' => 'سایت B', 'capacity'=>16, 'active'=>1, 'created'=>j_d_stamp_en()]);
        $institute -> classrooms()->save($classroom);
    }
}
