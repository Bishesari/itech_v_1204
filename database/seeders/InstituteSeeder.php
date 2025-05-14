<?php

namespace Database\Seeders;

use App\Models\Institute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstituteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('institutes')->insert([
            'short_name' => 'آی تک',
            'full_name' => 'آموزشگاه آی تک',
            'abb' => 'ITC',
            'created' => j_d_stamp_en(),
        ]);
    }
}
