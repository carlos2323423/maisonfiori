<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\Charts;
// use ConsoleTVs\Charts\Facades\Charts;
// use ConsoleTVs\Charts\Classes\Chartjs\Chart;
class ChartController extends Controller
{    
    public function index()
    {
        $usersChart = new Charts;
        $usersChart->labels(['Jan', 'Feb', 'Mar']);
        $usersChart->dataset('Users by trimester', 'line', [10, 25, 13]);
        return view('chart', [ 'usersChart' => $usersChart ] );
    }
    // public function index()
    // {
    //     $chart = Charts::generateBarChart();

    //     return view('chart', compact('chart'));
    // }    
}