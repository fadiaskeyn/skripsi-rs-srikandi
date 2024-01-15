<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\ReportRepository;
use Illuminate\Http\Request;
use App\Models\{Diagnosis, Patient, Payment, Room, Service};
use App\Services\MedicService;
use PDF;

class ReportController extends Controller
{
    private ReportRepository $repository;

    public function __construct()
    {
        $this->repository = new ReportRepository;
    }

    public function indicator(Request $request)
    {
        $startDate = $request->input('tanggal_start');
        $endDate = $request->input('tanggal_end');
        $roomID = $request->input('ruangan');

        return view('pages.reports.hospital-service-indicator', [
            'indicators' => $this->repository->getHospitalIndicators($startDate, $endDate, $roomID),
            'rooms' => Room::pluck('name', 'id')->toArray(),
            'startDate' => $startDate,
            'endDate' => $endDate,
            'selectedRoom' => $roomID, // Menambahkan selectedRoom
        ]);
    }



    public function visitors()
    {
        return view('pages.reports.hospital-visit', [
            'visitors' => $this->repository->getHospitalVisitors(),
            'rooms' => Room::pluck('name', 'id')->toArray(),
        ]);
    }

    public function cetakpdf()
    {
        $data = $this->repository->getData(); // Ganti dengan pemanggilan data yang sesuai
        $pdf = PDF::loadView('pdf.report', compact('data'));

        return $pdf->download('report.pdf');
    }
    public function fetchData(Request $request)
    {
        // Ambil data berdasarkan filter yang diberikan
        $ruangan = $request->input('ruangan');
        $tanggalStart = $request->input('tanggal_start');
        $tanggalEnd = $request->input('tanggal_end');

        // Panggil fungsi untuk mengambil data dengan filter date range
        $indicators = MedicService::getIndicatorsByDateRange($tanggalStart, $tanggalEnd, $ruangan);

        // Kembalikan data dalam format JSON
        return response()->json(['data' => $indicators]);
    }
}
