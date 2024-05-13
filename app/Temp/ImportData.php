<?php

namespace App\Temp;

use Spatie\SimpleExcel\SimpleExcelReader;

class ImportData
{
    public function importData()
    {

        SimpleExcelReader::create(storage_path('app/public/products.csv'))
            ->useDelimiter(',')
            ->useHeaders(['ID', 'title', 'description'])
            ->getRows()
            ->chunk(5000)
            ->each(
                function (array $row) {
                    //Model::withoutTimestamps(fn () => Product::updateOrCreate([
                    //    'product_id' => $row['ID'],
                    //    'title' => $row['title'],
                    //    'description' => $row['description'],
                    //]));
                }
            );
    }
}
