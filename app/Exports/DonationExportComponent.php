<?php

namespace App\Exports;

use App\Models\Donation;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class DonationExportComponent implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $donations = DB::table('donations')
            ->select(
                'transaction_id',
                'amount',
                'currency',
                'payment_status',
                'created_at',
            )
            ->get();
        return $donations;
    }
    public function headings(): array
    {
        return [
            'Transaction ID,',
            'Amount',
            'Currency',
            'Payment Status',
            'Date',
        ];
    }

    public function collections()
    {
        return Donation::all();
    }
}
