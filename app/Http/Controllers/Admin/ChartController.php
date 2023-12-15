<?php

namespace App\Http\Controllers\Admin;

use App\Charts\BarberJohnsonChart;
use App\Charts\DiagnoseChart;
use App\Charts\VisitorChart;
use App\Http\Controllers\Controller;
use App\Http\Requests\Chart\BarberJohnsonRequest;
use App\Models\PatientEntry;
use App\Repositories\DiagnosisRepository;
use App\Services\MedicService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    protected $diagnose, $chart;

    public function __construct(
        DiagnoseChart $diagnoseChart,
        VisitorChart $chart
    ) {
        $this->diagnose = $diagnoseChart;
        $this->chart = $chart;
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

    public function topDiagnose()
    {
        $diagnoses = (new DiagnosisRepository)->getTopDiagnoses();

        return view('pages.chart.top-diagnose', [
            'chart' => $this->diagnose->build($diagnoses),
            'diagnoses' => $diagnoses,
        ]);
    }

    public function barberJohnsonJson(BarberJohnsonRequest $request)
    {
        $month = $request->month;
        $year = $request->year;

        $data = MedicService::getIndicators($month, $year);
        return response()->json(compact('data'));
    }
}
