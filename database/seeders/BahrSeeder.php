<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BahrType;

class BahrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $data= [
            ['name' => 'الطويل'],
            ['name' => 'المنسرح'],
            ['name' => 'المتقارب'],
            ['name' => 'الخفيف'],
            ['name' => 'الكامل'],
            ['name' => 'السريع'],
            ['name' => 'الوافر'],
            ['name' => 'الرجز'],
            ['name' => 'البسيط'],
            ['name' => 'الرمل'],
            ['name' => 'المجتث'],
            ['name' => 'المديد'],
            ['name' => 'الهزج'],
            ['name' => 'المتدارك'],
            ['name' => 'المقتضب'],
            ['name' => 'المضارع'],
            ['name' => 'شعر التفعيلة'],
            ['name' => 'الدوبيت'],
            ['name' => 'موشح'],
            ['name' => '""'],
            ['name' => 'السلسلة'],
            ['name' => 'المواليا'],
            ['name' => 'شعر حر'],
            ['name' => 'عامي'],
        ];

        foreach($data as $row){

            BahrType::create($row);
        }

    }
}
