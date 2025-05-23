<?php

namespace Database\Seeders;

use App\Models\Field;
use Illuminate\Database\Seeder;

class FieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Field::create(['name_fa' => 'فناوری اطلاعات', 'created' => j_d_stamp_en()]);
        Field::create(['name_fa' => 'امور مالی و بازرگانی', 'created' => j_d_stamp_en()]);
        Field::create(['name_fa' => 'هنرهای تجسمی', 'created' => j_d_stamp_en()]);
    }
}
