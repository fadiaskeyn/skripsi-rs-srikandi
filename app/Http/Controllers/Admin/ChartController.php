<?php

namespace App\Http\Controllers\Admin;

use App\Charts\BarberJohnsonChart;
use App\Charts\VisitorChart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        // return view('pages.grafik.kunjungan', ['chart'=> $this->chart->build()]);
        return view('pages.grafik.kunjungan.index');
    }

    public function inpatient()
    {
        // return view('pages.grafik.rawat-inap', ['chart'=> $this->chart->build()]);
        return view('pages.grafik.rawat-inap.index');
    }

    public function barberJohnson()
    {
        // return view('pages.grafik.barber-johnson', ['chart' => $this->barber->build()]);
        return view('pages.grafik.barber-johnson.index');
    }
}
