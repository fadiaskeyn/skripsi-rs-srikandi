<?php

namespace App\Services;

use App\Enums\PatientWayout;
use App\Models\PatientEntry;
use App\Models\Room;
use Carbon\Carbon;
use App\Services\DB;

class MedicService
{
    public static function getLongCare(PatientEntry $entry)
    {
        if(!$entry->out_date) return 0;
        return $entry->date->diffInDays($entry->out_date);
    }

    public static function getIndicators($month, $year)
    {
        $bedsTotal = Room::all()->sum('number_of_beds');
        $patients = PatientEntry::whereMonth('date', $month)
                ->whereYear('date', $year)
                ->get();

        $patientDieds = PatientEntry::whereMonth('date', $month)
            ->whereYear('date', $year)
            ->where('way_out', PatientWayout::DIED->value)
            ->count();

        $patientDiedsMore = PatientEntry::whereMonth('date', $month)
            ->whereYear('date', $year)
            ->where('way_out', PatientWayout::DIED->value)
            ->whereRaw('TIMESTAMPDIFF(HOUR, date, out_date) > 48')
            ->count();

        $patientOutsTotal = PatientEntry::whereMonth('date', $month)
            ->whereYear('date', $year)
            ->whereNotNull('out_date')
            ->count();

        $days = Carbon::createFromFormat('Y-m', $year . '-' . $month)
            ->daysInMonth;

        $longCares = $patients->reduce(
            fn(?int $carry, PatientEntry $patient) => $carry + MedicService::getLongCare($patient),
            0
        );

        return (object) [
           'date' => Carbon::createFromFormat('Y-m-d', $year . '-' . $month . '-01')->format('d-m-Y'),
            'beds_total' => $bedsTotal,
            'bor' => ($patients->count() / ($bedsTotal * $days)) * 100,
            'alos' => $longCares == 0 ? 0 : $longCares / $patientOutsTotal,
            'toi' => $patientOutsTotal == 0 ? 0 :
                (($bedsTotal * $days) - $patients->count()) / $patientOutsTotal,
            'bto' => $patientOutsTotal / $bedsTotal,
            'gdr' => $patientOutsTotal == 0 ? 0 :
                ($patientDieds / $patientOutsTotal) * (1000 / 100),
            'ndr' => $patientOutsTotal == 0 ? 0 :
                ($patientDiedsMore / $patientOutsTotal) * (1000 / 100),
            'days' => $days,
        ];
    }

     public static function getIndicatorsByDateRange($startDate, $endDate, $ruangan)
    {
        $query = PatientEntry::query()
            ->select('date', DB::raw('MONTH(date) as month, YEAR(date) AS year'))
            ->groupBy('date', 'year', 'month');

        // Filter berdasarkan ruangan jika disediakan
        if (!empty($ruangan)) {
            $query->where('ruangan', $ruangan);
        }

        $dates = $query->whereBetween('date', [$startDate, $endDate])->get();

        return $dates->map(function ($date) {
            return self::getIndicators($date->month, $date->year, $date->date);
        });
    }
}
