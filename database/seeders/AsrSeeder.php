<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Asr;

class AsrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data= [
            ['name' => 'قبل الإسلام'],
            ['name' => 'المخضرمين'],
            ['name' => 'العباسي'],
            ['name' => 'الأموي'],
            ['name' => 'المملوكي'],
            ['name' => 'المغرب والأندلس'],
            ['name' => 'بين الدولتين'],
            ['name' => 'الفاطمي'],
            ['name' => 'الأيوبي'],
            ['name' => 'الحديث'],
            ['name' => 'الإسلامي'],
            ['name' => 'العثماني'],
        ];

        foreach ($data as $row) {
            Asr::create($row);
        }
    }


}
