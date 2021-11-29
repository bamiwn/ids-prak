<?php

namespace App\Imports;

use App\cust;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;

class CustImport implements ToModel, WithHeadingRow, SkipsOnError, WithBatchInserts, SkipsOnFailure, WithValidation
{
    use Importable, SkipsErrors, SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new cust([
            'id_customer' => $row['id_customer'],
            'nama' => $row['nama'] ?? $row['nama_lengkap'],
            'alamat' => $row['alamat'],
            'kodepos' => $row['kodepos']
        ]);
    }

    public function batchSize(): int
    {
        return 1000;
    }
    
    public function rules(): array
    {
        return [
            '*.id_customer' => ['unique:cust,id_customer']
        ];
    }
}
