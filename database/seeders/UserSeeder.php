<?php

namespace Database\Seeders;

use App\Models\Mobile;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create(['user_name' => 'YasserSA', 'password' => '123456789', 'created' => j_d_stamp_en()]);
        $user->profile()->create(['n_code' => '2063531218', 'f_name_fa' => 'یاسر', 'l_name_fa' => 'بیشه سری', 'created' => j_d_stamp_en()]);
        $mobile = Mobile::create(['mobile_nu' => '09177755924', 'verified'=> '1', 'created' => j_d_stamp_en()]);
        $user->mobiles()->attach($mobile['id'], ['created' => j_d_stamp_en()]);
        $user->roles()->attach([ 1 => ['institute_id' => 1] ]);
    }
}
