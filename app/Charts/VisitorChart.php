<?php

namespace App\Charts;

use App\Models\PatientEntry;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\Cache;

class VisitorChart
{
    protected $chart;
    
    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {

        $maleCount = PatientEntry::whereHas('patient', function ($query) {
            $query->where('gender', 'L');
        })->count();

        $femaleCount = PatientEntry::whereHas('patient', function ($query) {
            $query->where('gender', 'P');
        })->count();

        $genderData = [
            'Laki-laki' => $maleCount,
            'Perempuan' => $femaleCount,
        ];


        $chart = $this->chart->pieChart()
            ->addData(array_values($genderData))
            ->setLabels(array_keys($genderData));

        return $chart;
    }
}
