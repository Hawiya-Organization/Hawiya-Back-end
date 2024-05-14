<?php

namespace App\Temp;

use App\Models\Poem;
use Spatie\SimpleExcel\SimpleExcelReader;


class ImportData
{
    public static function  handle()
    {

        $rows =  SimpleExcelReader::create(storage_path('app/public/poems.csv'))
            ->useDelimiter(',')
            ->useHeaders(['id', 'kafiya_id', 'bahr_type_id', 'authorable_id', 'asr_id', 'diwan_id', 'title', 'authorable_type', 'is_hor'])
            ->getRows();

        foreach ($rows as $item) {

            Poem::query()->create([
                //'id' => $item->id,
                'kafiya_id' => intval($item['kafiya_id']),
                'bahr_type_id' => intval($item['bahr_type_id']),
                'authorable_id' => intval($item['authorable_id']),
                'asr_id' => intval($item['asr_id']),
                'diwan_id' => intval($item['diwan_id']),
                'title' => $item['title'],
                'authorable_type' => $item['authorable_type'],
                'is_hor' => false


            ]);
        }
    }
}
