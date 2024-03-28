<?php

namespace App\Exports;

use App\Models\FoundDog;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FoundDogExportComponent implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $found_dogs = DB::table('found_dogs')
            ->select(
                'name',
                'gender',
                'color',
                'breed',
                'description',
                'missing_status',
            )
            ->get();
        return $found_dogs;
    }
    public function headings(): array
    {
        return [
            'Name',
            'Gender',
            'Color',
            'Breed',
            'Description',
            'Missing Status',
        ];
    }

    public function collections()
    {
        return FoundDog::all();
    }
}
