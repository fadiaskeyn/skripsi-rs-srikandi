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
        return view('pages.chart.visit', ['chart'=> $this->chart->build()]);
    }

    public function inpatient()
    {
        return view('pages.chart.inpatient', ['chart'=> $this->chart->build()]);
    }

    public function barberJohnson()
    {
        return view('pages.chart.barber-johnson', ['chart' => $this->barber->build()]);
    }
}
