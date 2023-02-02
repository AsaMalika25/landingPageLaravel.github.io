<?php

namespace App\Imports;

use App\Models\prestasi;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new prestasi([
            'id' => $row[0],
            'judul' => $row[1],
        ]);
    }
}
