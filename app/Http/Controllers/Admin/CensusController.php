<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Diagnosis, Patient, Payment, Room, Service};
use App\Repositories\ReportRepository;
use Illuminate\Http\Request;

class CensusController extends Controller
{
    private ReportRepository $reportRepo;

    public function __construct()
    {
        $this->reportRepo = new ReportRepository;
    }

    public function __invoke(Request $request)
{
    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');
    $roomID = $request->input('ruangan'); // Jika ini yang digunakan untuk mendapatkan $roomID

    // Validasi format tanggal
    $request->validate([
        'start_date' => 'nullable|date_format:Y-m-d',
        'end_date' => 'nullable|date_format:Y-m-d|after_or_equal:start_date',
    ]);

    return view("pages.census.index", [
        'data' => $this->reportRepo->getCensusRecapitulations($startDate, $endDate, $roomID),
        'payments' => Payment::pluck('name'),
        'rooms' => Room::pluck('name', 'id')->toArray(),
    ]);
}


}
