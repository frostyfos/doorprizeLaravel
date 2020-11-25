<?php

namespace App\Imports;

use App\Participant;
use Maatwebsite\Excel\Concerns\ToModel;

use Maatwebsite\Excel\Concerns\WithStartRow;

class ParticipantImport implements ToModel, WithStartRow
{

    public function model(array $row)
    {
        return new Participant([
            'nik' => $row[0],
            'name' => $row[1],
            'claimed' => 0,
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
