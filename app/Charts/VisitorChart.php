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

    public function countPatientsByGender($gender) {
        return PatientEntry::whereHas('patient', function ($query) use ($gender) {
            $query->where('gender', $gender);
        })->count();
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {

        $male = $this->countPatientsByGender('L');
        $female = $this->countPatientsByGender('P');

        $chart = $this->chart->pieChart()
        ->addData([$male, $female])
        ->setLabels(['Laki-laki', 'Perempuan']);

        return $chart;
    }
}
