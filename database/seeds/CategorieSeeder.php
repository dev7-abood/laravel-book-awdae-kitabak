<?php

use Illuminate\Database\Seeder;
use App\Models\Categorie;


class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories =
            [
                [
                    'name' => 'متطلبات الجامعية',
                    'name_shorthand' => 'db',
                    'img_url' => 'img/college_img/university_requirements.png',
                    'btn_color' => 'dark',
                ],
                [
                    'name' => 'تكلونوجيا المعلومات',
                    'name_shorthand' => 'it',
                    'img_url' => 'img/college_img/flat-design-thinking-character-with-elements-around_-1@2x.png',
                    'btn_color' => 'primary',
                ],
                [
                    'name' => 'الهندسة',
                    'name_shorthand' => 'eng',
                    'img_url' => 'img/college_img/flat-engineering-team-background_23-2148158171@2x.png',
                    'btn_color' => 'primary',
                ],
                [
                    'name' => 'الطب',
                    'name_shorthand' => 'doc',
                    'img_url' => 'img/college_img/set-doctors-operating-medical-equipment-examining-patients_-1@2x.png',
                    'btn_color' => 'primary',
                ],
                [
                    'name' => 'أصول الدين',
                    'name_shorthand' => 'reli',
                    'img_url' => 'img/college_img/muslim-man-reading-quran-holy-book-islam-with-leaf-flower-nature-ramadan_7102-181@2x.png',
                    'btn_color' => 'primary',
                ],
                [
                    'name' => 'التمريض',
                    'name_shorthand' => 'sick',
                    'img_url' => 'img/college_img/nurse-helping-patient-background_23-2148150161@2x.png',
                    'btn_color' => 'primary',
                ],
                [
                    'name' => 'الشريعة والقانون',
                    'name_shorthand' => 'law',
                    'img_url' => 'img/college_img/background-with-advocacy-elements_23-2147805937@2x.png',
                    'btn_color' => 'primary',
                ],
                [
                    'name' => 'العلوم',
                    'name_shorthand' => 'sciences',
                    'img_url' => 'img/college_img/hand-drawn-chemistry-element-background_52683-9226@2x.png',
                    'btn_color' => 'primary',
                ],
                [
                    'name' => 'العلوم الصحية',
                    'name_shorthand' => 'heal',
                    'img_url' => 'img/college_img/ople-donating-blood-background-flat-design_-1@2x.png',
                    'btn_color' => 'primary',
                ],
                [
                    'name' => 'الاقتصاد والعلوم الإدارية',
                    'name_shorthand' => 'economy',
                    'img_url' => 'img/college_img/team-investment-management-discuss-together-growth-increase-business-vector-illustration_25147-9@2x.png',
                    'btn_color' => 'primary',
                ],
                [
                    'name' => 'التربية',
                    'name_shorthand' => 'teach',
                    'img_url' => 'img/college_img/76914ee1-05c1-4521-a8e5-f25db6313151-removebg-preview@2x.png',
                    'btn_color' => 'primary',
                ],
                [
                    'name' => 'الآداب',
                    'name_shorthand' => 'decency',
                    'img_url' => 'img/college_img/young-people-reading-together_-1@2x.png',
                    'btn_color' => 'primary',
                ]
            ];

        foreach ($categories as $cat)
        {
            Categorie::create($cat);
        }

    }
}
