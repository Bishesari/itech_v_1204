<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Skill::create(['field_id' => 1, 'code' => '251340530000031', 'name_fa' => 'ساخت برنامه های وب با استفاده از Laravel Framework',
            'name_en' => 'Build Web Apps Using Laravel Framework', 'abb'=> 'لاراول', 'nazari_h' => 30, 'amali_h' => 60, 'karvarzi_h' => 0,
            'project_h' => 0, 'sum_h' => 90, 'required_h'=>120,'created' => j_d_stamp_en()]);

        Skill::create(['field_id' => 1, 'code' => '351230530000111', 'name_fa' => 'برنامه نویسی Python',
            'name_en' => 'Programming Python', 'abb'=> 'پایتون', 'nazari_h' => 20, 'amali_h' => 90, 'karvarzi_h' => 0,
            'project_h' => 0, 'sum_h' => 110, 'required_h'=>70, 'created' => j_d_stamp_en()]);

        Skill::create(['field_id' => 1, 'code' => '732120530140001', 'name_fa' => 'کاربر ICDL',
            'name_en' => 'ICDL USER', 'abb'=> 'ICDL', 'nazari_h' => 30, 'amali_h' => 100, 'karvarzi_h' => 0,
            'project_h' => 0, 'sum_h' => 130, 'required_h'=>70, 'created' => j_d_stamp_en()]);

        Skill::create(['field_id' => 2, 'code' => '431320450010002', 'name_fa' => 'حسابدار حقوق و دستمزد',
            'name_en' => 'Payroll Accountant', 'abb'=> 'حقوق و دستمزد', 'nazari_h' => 38, 'amali_h' => 82, 'karvarzi_h' => 0,
            'project_h' => 0, 'sum_h' => 120, 'required_h'=>40, 'created' => j_d_stamp_en()]);

        Skill::create(['field_id' => 1, 'code' => '265420531200001', 'name_fa' => 'کارور PREMIERE	',
            'name_en' => 'PREMIERE User', 'abb'=> 'پریمیر', 'nazari_h' => 16, 'amali_h' => 32, 'karvarzi_h' => 0,
            'project_h' => 0, 'sum_h' => 48, 'required_h'=>20, 'created' => j_d_stamp_en()]);

        Skill::create(['field_id' => 1, 'code' => '73212053003001', 'name_fa' => 'توسعه دهنده صفحات وب با PHP و Mysql',
            'name_en' => 'Web page developer with php and mysql', 'abb'=> 'PHP, MySQL', 'nazari_h' => 92, 'amali_h' => 278, 'karvarzi_h' => 0,
            'project_h' => 0, 'sum_h' => 370, 'required_h'=>100, 'created' => j_d_stamp_en()]);

        Skill::create(['field_id' => 1, 'code' => '251340530320011', 'name_fa' => 'Web Design Fundamental (HTML5, CSS3)',
            'name_en' => 'Web Design Fundamental (HTML5, CSS3)', 'abb'=> 'HTML, CSS', 'nazari_h' => 20, 'amali_h' => 34, 'karvarzi_h' => 0,
            'project_h' => 0, 'sum_h' => 54, 'required_h'=>30, 'created' => j_d_stamp_en()]);

        Skill::create(['field_id' => 1, 'code' => '732120530130001', 'name_fa' => 'کاربر رایانه',
            'name_en' => 'Computer User', 'abb'=> 'کاربر رایانه', 'nazari_h' => 81, 'amali_h' => 219, 'karvarzi_h' => 0,
            'project_h' => 0, 'sum_h' => 300, 'required_h'=>100, 'active'=>'0', 'created' => j_d_stamp_en()]);

        Skill::create(['field_id' => 1, 'code' => '3-42/24/1/4', 'name_fa' => 'کاربر نرم افزار اداری',
            'name_en' => 'Computer Software User', 'abb'=> 'نرم افزار اداری', 'nazari_h' => 57.5, 'amali_h' => 157.5, 'karvarzi_h' => 0,
            'project_h' => 15, 'sum_h' => 230, 'required_h'=>100, 'active'=>'0', 'created' => j_d_stamp_en()]);

        Skill::create(['field_id' => 2, 'code' => '1-10/18/1/5', 'name_fa' => 'رایانه کار حسابدار مالی',
            'name_en' => 'Financial Accounting', 'abb'=> 'هلو (حسابداری مالی)', 'nazari_h' => 56, 'amali_h' => 40, 'karvarzi_h' => 0,
            'project_h' => 0, 'sum_h' => 96, 'required_h'=>70, 'active'=>'1', 'created' => j_d_stamp_en()]);

        Skill::create(['field_id' => 1, 'code' => '1-66/51/1/3', 'name_fa' => 'طراح گرافیک رایانه ای',
            'name_en' => 'Computer Graphic Designer', 'abb'=> 'فتوشاپ', 'nazari_h' => 50, 'amali_h' => 150, 'karvarzi_h' => 0,
            'project_h' => 0, 'sum_h' => 200, 'required_h'=>85, 'active'=>'1', 'created' => j_d_stamp_en()]);

        Skill::create(['field_id' => 1, 'code' => '1-62/541/1', 'name_fa' => 'کارور Corel Draw',
            'name_en' => 'Corel Draw', 'abb'=> 'کارل دراو', 'nazari_h' => 18, 'amali_h' => 34, 'karvarzi_h' => 0,
            'project_h' => 18, 'sum_h' => 70, 'required_h'=>30, 'active'=>'0', 'created' => j_d_stamp_en()]);

        Skill::create(['field_id' => 1, 'code' => '1-61/46/1/3', 'name_fa' => 'کارور Flash MX',
            'name_en' => 'Flash MX', 'abb'=> 'فلش ام ایکس', 'nazari_h' => 32, 'amali_h' => 64, 'karvarzi_h' => 0,
            'project_h' => 0, 'sum_h' => 96, 'required_h'=>32, 'active'=>'0', 'created' => j_d_stamp_en()]);

        Skill::create(['field_id' => 1, 'code' => '251340531960011', 'name_fa' => 'برنامه نویسی ++C',
            'name_en' => '++Programming C', 'abb'=> 'سی پلاس', 'nazari_h' => 27, 'amali_h' => 83, 'karvarzi_h' => 0,
            'project_h' => 0, 'sum_h' => 110, 'required_h'=>40, 'active'=>'1', 'created' => j_d_stamp_en()]);

        Skill::create(['field_id' => 2, 'code' => '331130450020061', 'name_fa' => 'معامله گری ارز های دیجیتال',
            'name_en' => 'CryptoCurrency Trading', 'abb'=> 'ارز دیجیتال', 'nazari_h' => 10, 'amali_h' => 20, 'karvarzi_h' => 0,
            'project_h' => 0, 'sum_h' => 30, 'required_h'=>30, 'active'=>'1', 'created' => j_d_stamp_en()]);

        Skill::create(['field_id' => 3, 'code' => '343130830020001', 'name_fa' => 'عکاس دیجیتال',
            'name_en' => 'Digital Photographer', 'abb'=> 'عکاس دیجیتال', 'nazari_h' => 108, 'amali_h' => 178, 'karvarzi_h' => 0,
            'project_h' => 0, 'sum_h' => 286, 'required_h'=>70, 'created' => j_d_stamp_en()]);

        Skill::create(['field_id' => 1, 'code' => '216640531080001', 'name_fa' => 'کارور Auto CAD',
            'name_en' => 'AUTO CAD User', 'abb'=> 'اتوکد', 'nazari_h' => 80, 'amali_h' => 88, 'karvarzi_h' => 0,
            'project_h' => 14, 'sum_h' => 142, 'required_h'=>50, 'created' => j_d_stamp_en()]);
    }
}
