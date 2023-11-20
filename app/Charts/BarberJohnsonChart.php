<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class BarberJohnsonChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
       return $this->chart->lineChart()
            ->setTitle('Sales during 2021.')
            ->setSubtitle('Physical sales vs Digital sales.')
            ->addData('Published posts', [4, 9, 5, 2, 1, 8])
            ->addData('Unpublished posts', [7, 2, 7, 2, 5, 4])
            ->setColors(['#ffc63b', '#ff6384'])
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);
    }
}
