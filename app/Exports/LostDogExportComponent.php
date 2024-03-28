<?php

namespace App\Exports;

use App\Models\LostDog;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LostDogExportComponent implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $lost_dogs = DB::table('lost_dogs')
            ->select(
                'name',
                'gender',
                'color',
                'breed',
                'description',
                'missing_status',
                'payment_status',
            )
            ->get();
        return $lost_dogs;
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
            'Payment Status',
        ];
    }

    public function collections()
    {
        return LostDog::all();
    }
}
