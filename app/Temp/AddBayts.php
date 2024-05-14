<?php


namespace App\Temp;

use App\Models\Bayt;
use Spatie\SimpleExcel\SimpleExcelReader;



class AddBayts
{
    public static function handle()
    {

        $rows =  SimpleExcelReader::create(storage_path('app/public/bayts.csv'))
            ->useDelimiter(',')
            ->useHeaders(['poem_id', 'الشطر الايمن', 'الشطر الايسر'])
            ->getRows();
        $number = 1;
        $counter = 1;
        $currentPoem = 1;
        foreach ($rows as $item) {
            $peom_id = intval($item['poem_id']);
            if($peom_id == 0){
                $peom_id = null;
            }
            if ($currentPoem != $peom_id) {
                $number = 1;
                $currentPoem = $peom_id;
            }
            Bayt::query()->create([
                'id'=>$counter,
                'poem_id' => $peom_id,
                'content' => json_encode([
                    'number' => $number,
                    'sadr' => $item['الشطر الايمن'],
                    'ajoz' => $item['الشطر الايسر']
                ]),
            ]);
            $number++;

            if ($counter == 100000) {
                break;
            }
            $counter++;
        }
    }
}
