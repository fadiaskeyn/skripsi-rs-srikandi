<?php

namespace App\Http\Controllers\Admin;

use App\Charts\BarberJohnsonChart;
use App\Charts\DiagnoseChart;
use App\Charts\VisitorChart;
use App\Http\Controllers\Controller;
use App\Http\Requests\Chart\BarberJohnsonRequest;
use App\Models\PatientEntry;
use App\Repositories\DiagnosisRepository;
use App\Repositories\RoomRepository;
use App\Services\MedicService;
use Illuminate\Http\Request;
use App\Models\Room;
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
        return view('pages.chart.visit', ['chart'=> $this->chart->build(),
        'rooms' => Room::pluck('name', 'id')->toArray(),
    ]);

    }

    public function inpatient()
    {
        return view('pages.chart.inpatient', ['chart'=> $this->chart->build()]);
    }

    public function barberJohnson(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        // $roomID = $request->input('ruangan');

        $dates = PatientEntry::select(DB::raw('DAY(date) as day, MONTH(date) as month, YEAR(date) AS year'))
            ->groupBy('day', 'year', 'month')
            ->get();

        return view('pages.chart.barber-johnson', compact('dates'));
    }



    public function barberJohnsonJson(Request $request)
{
    $start_date = $request->input('start_date');
    $end_date = $request->input('end_date');

    // Pemrosesan tanggal jika diperlukan
    // Misalnya, ubah format tanggal sesuai kebutuhan
    $start_date = date('Y-m-d', strtotime($start_date));
    $end_date = date('Y-m-d', strtotime($end_date));

    $data = MedicService::getIndicators($start_date, $end_date);

    return response()->json(compact('data'));
}


    public function topDiagnose()
    {
        $rooms = (new RoomRepository)->getData();
        $diagnoses = (new DiagnosisRepository)->getTopDiagnoses();
        return view('pages.chart.top-diagnose', [
            'chart' => $this->diagnose->build($diagnoses),
            'diagnoses' => $diagnoses,
            'rooms' => Room::pluck('name', 'id')->toArray(),
        ]);
    }
}
