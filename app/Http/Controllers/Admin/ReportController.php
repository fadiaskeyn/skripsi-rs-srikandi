<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\ReportRepository;
use Illuminate\Http\Request;
use PDF;

class ReportController extends Controller
{
    private ReportRepository $repository;

    public function __construct()
    {
        $this->repository = new ReportRepository;
    }

    public function indicator()
    {
        return view('pages.reports.hospital-service-indicator', [
            'indicators' => $this->repository->getHospitalIndicators(),
        ]);
    }

    public function visitors()
    {
        return view('pages.reports.hospital-visit', [
            'visitors' => $this->repository->getHospitalVisitors(),
        ]);
    }

    public function cetakpdf()
    {
        $data = $this->repository->getData(); // Ganti dengan pemanggilan data yang sesuai
        $pdf = PDF::loadView('pdf.report', compact('data'));

        return $pdf->download('report.pdf');
    }
}
