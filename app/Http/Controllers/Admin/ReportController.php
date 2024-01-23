<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\ReportRepository;
use Illuminate\Http\Request;
use App\Models\{Diagnosis, Patient, Payment, Room, Service, PatientEntry};
use App\Services\MedicService;
use PDF;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReportController extends Controller
{
    private ReportRepository $repository;

    public function __construct()
    {
        $this->repository = new ReportRepository;
    }

    public function indicator(Request $request)
{
    $selectedDate = $request->input('selected_date');
    $roomID = $request->input('ruangan');

    $periods = PatientEntry::selectRaw('MONTH(date) as month, YEAR(date) as year')
    ->groupBy(DB::raw('YEAR(date), MONTH(date)'))
    ->get();

    // Extract month and year from the selected date
    // dd($selectedDate); // Tambahkan ini sebelum list($month, $year) = explode('-', $selectedDate);
    if (!empty($selectedDate)) {
        list($month, $year) = explode('-', $selectedDate);
    }
    return view('pages.reports.hospital-service-indicator', [
        'periods' => $this->repository->getHospitalIndicators($month, $year, $roomID),
        'rooms' => Room::pluck('name', 'id')->toArray(),
        'selectedDate' => $selectedDate
    ]);
}


// public function indicator()
//     {
//         return view('pages.reports.hospital-service-indicator', [
//             'indicators' => $this->repository->getHospitalIndicators(),
//         ]);
//     }





public function visitors(Request $request)
{
    $startDate = $request->input('tanggal_start');
    $endDate = $request->input('tanggal_end');
    $roomID = $request->input('ruangan');
    return view('pages.reports.hospital-visit', [
        'visitors' => $this->repository->getHospitalVisitors($startDate, $endDate, $roomID),
        'rooms' => Room::pluck('name', 'id')->toArray(),
        'startDate' => $startDate,
        'endDate' => $endDate,
        'selectedRoom' => $roomID,
    ]);
}

    public function cetakpdf()
    {
        return view('pages.reports.report');
        // $data = $this->repository->getData(); // Ganti dengan pemanggilan data yang sesuai
        // $pdf = PDF::loadView('pdf.report', compact('data'));

        // return $pdf->download('report.pdf');
    }


}
    // // public function fetchData(Request $request)
    // // {
    // //     // Ambil data berdasarkan filter yang diberikan
    // //     $ruangan = $request->input('ruangan');
    // //     $tanggalStart = $request->input('tanggal_start');
    // //     $tanggalEnd = $request->input('tanggal_end');

    // //     // Panggil fungsi untuk mengambil data dengan filter date range
    // //     $indicators = MedicService::getIndicatorsByDateRange($tanggalStart, $tanggalEnd, $ruangan);

    // //     // Kembalikan data dalam format JSON
    // //     return response()->json(['data' => $indicators]);
    // }

