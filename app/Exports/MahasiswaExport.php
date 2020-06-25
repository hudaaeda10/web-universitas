<?php

namespace App\Exports;

use App\Mahasiswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MahasiswaExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Mahasiswa::all();
    }

    public function map($mahasiswa): array
    {
        return [
            $mahasiswa->nama_lengkap(),
            $mahasiswa->jenis_kelamin,
            $mahasiswa->agama,
            $mahasiswa->alamat,
            $mahasiswa->rataRataNilai(),
        ];
    }

     public function headings(): array
    {
        return [
            'NAMA LENGKAP',
            'JENIS KELAMIN',
            'AGAMA',
            'ALAMAT',
            'RATA-RATA NILAI',
        ];
    }
}
