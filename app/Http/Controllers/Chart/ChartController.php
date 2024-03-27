<?php

namespace App\Http\Controllers\Chart;

use App\Http\Controllers\Controller;
use App\Models\LostDog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function lostDogs()
    {
        $lost_dogs = LostDog::select(DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->plunk('count');
        $months = LostDog::select(DB::raw("Month(created_at) as month"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->plunk('month');

        $data = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        foreach ($months as $index => $month) {
            $data[$month] = $lost_dogs[$index];
            // $data[$month - 1]=$lost_dogs[$index];
        }
        return view('chart.lost-log-chart', compact('data'));
    }
}
