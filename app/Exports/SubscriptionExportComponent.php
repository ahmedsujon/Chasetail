<?php

namespace App\Exports;

use App\Models\Subscription;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class SubscriptionExportComponent implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $subscriptions = DB::table('subscriptions')
            ->select(
                'card_holder_name',
                'transaction_id',
                'amount',
                'currency',
                'payment_status',
                'created_at',
            )
            ->get();
        return $subscriptions;
    }
    public function headings(): array
    {
        return [
            'Card Holder Name',
            'Transaction ID,',
            'Amount',
            'Currency',
            'Payment Status',
            'Date',
        ];
    }

    public function collections()
    {
        return Subscription::all();
    }
}
