<?php

namespace App\Http\Controllers\Admin;

use App\Charts\BarberJohnsonChart;
use App\Charts\VisitorChart;
use App\Http\Controllers\Controller;
use App\Http\Requests\Chart\BarberJohnsonRequest;
use App\Models\PatientEntry;
use App\Services\MedicService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    protected $chart;
    protected $barber;

    public function __construct(VisitorChart $chart, BarberJohnsonChart $barberJohnsonChart)
    {
        $this->chart = $chart;
        $this->barber = $barberJohnsonChart;
    }

    public function visit()
    {
        return view('pages.chart.visit', ['chart'=> $this->chart->build()]);
    }

    public function inpatient()
    {
        return view('pages.chart.inpatient', ['chart'=> $this->chart->build()]);
    }

    public function barberJohnson()
    {
        $periods = PatientEntry::select(DB::raw('MONTH(date) as month, YEAR(date) AS year'))
            ->groupBy('year', 'month')
            ->get();

        return view('pages.chart.barber-johnson', compact('periods'));
    }

    public function barberJohnsonJson(BarberJohnsonRequest $request)
    {
        $month = $request->month;
        $year = $request->year;

        $data = MedicService::getIndicators($month, $year);
        return response()->json(compact('data'));
    }
}
