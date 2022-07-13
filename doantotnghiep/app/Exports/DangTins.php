<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Dangtin;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Support\Facades\DB;

class DangTins implements FromCollection,WithHeadings,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       return Dangtin::select('Tieude','Diachi','Giaphong')->get();
    }

    public function headings(): array
    {
        return [
            'Tiêu đề',
            'Địa Chỉ',
            'Giaphong',
        ];
    }


}

