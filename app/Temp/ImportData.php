<?php

namespace App\Temp;

use App\Models\Poem;



use Spatie\SimpleExcel\SimpleExcelReader;

class ImportData
{
    public function importData()
    {

        SimpleExcelReader::create(storage_path('app/public/poems.csv'))
            ->useDelimiter(',')
            ->useHeaders(['id', 'kafiya_id', 'bahr_type_id', 'authorable_id', 'asr_id', 'diwan_id', 'title', 'authorable_type', 'is_hor'])
            ->getRows()
            ->chunk(5000)
            ->each(
                function (array $row) {
                    Poem::create([
                        'id' => $row['id'],
                        'kafiya_id' => $row['kafiya_id'],
                        'bahr_type_id' => $row['bahr_type_id'],
                        'authorable_id' => $row['authorable_id'],
                        'asr_id' => $row['asr_id'],
                        'diwan_id' => $row['diwan_id'],
                        'title' => $row['title'],
                        'authorable_type' => $row['authorable_type'],
                        'is_hor' => $row['is_hor']
                    ]);
                }
            );
    }
}
