<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BahrType;

class BahrTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bohors = [
            ['name' => 'المديد'],
            ['name' => 'الوافر'],
            ['name' => 'المجتث'],
            ['name' => 'الرمل'],
            ['name' => 'الخفيف'],
            // Add more bohors here
        ];

        foreach ($bohors as $bohor) {
            BahrType::create($bohor);
        }
    }
}
