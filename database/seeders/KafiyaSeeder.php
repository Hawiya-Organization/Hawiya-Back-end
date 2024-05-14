<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Kafiya;

class KafiyaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'د'],
            ['name' => 'ح'],
            ['name' => 'م'],
            ['name' => 'ل'],
            ['name' => 'ف'],
            ['name' => 'ب'],
            ['name' => 'ر'],
            ['name' => 'ي'],
            ['name' => 'ء'],
            ['name' => 'ت'],
            ['name' => 'ن'],
            ['name' => 'ج'],
            ['name' => 'ذ'],
            ['name' => 'ز'],
            ['name' => 'س'],
            ['name' => 'ش'],
            ['name' => 'ض'],
            ['name' => 'ع'],
            ['name' => 'ق'],
            ['name' => 'ك'],
            ['name' => 'ه'],
            ['name' => 'ط'],
            ['name' => 'ث'],
            ['name' => 'و'],
            ['name' => 'ا'],
            ['name' => 'خ'],
            ['name' => 'غ'],
            ['name' => 'ص'],
            ['name' => 'ظ'],
            ['name' => 'ى'],
            ['name' => 'هـ'],
            ['name' => 'هن'],
            ['name' => 'ة'],
            ['name' => 'لا'],
            ['name' => 'ؤ'],
            ['name' => 'طن'],
        ];


        foreach($data as $row){
            Kafiya::create($row);
        }
    }
}
