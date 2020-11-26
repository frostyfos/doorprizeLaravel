<?php

namespace App\Exports;

use App\PrizeResult;
use Maatwebsite\Excel\Concerns\FromCollection;

class ResultExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PrizeResult::all();
    }
}
