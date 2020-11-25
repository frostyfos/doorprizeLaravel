<?php

namespace App\Imports;

use App\Prize;
use Maatwebsite\Excel\Concerns\ToModel;

use Maatwebsite\Excel\Concerns\WithStartRow;

class PrizeImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Prize([
            //
            'prizeName' => $row[0],
            'qty' => $row[1],
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
