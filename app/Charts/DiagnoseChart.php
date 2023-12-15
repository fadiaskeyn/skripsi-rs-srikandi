<?php

namespace App\Charts;

use App\Repositories\DiagnosisRepository;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class DiagnoseChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($diagnoses): \ArielMejiaDev\LarapexCharts\BarChart
    {
        return $this->chart->barChart()
            ->addData('Total', $diagnoses->totals)
            ->setXAxis($diagnoses->names);
    }
}
