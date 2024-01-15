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

    public function __invoke()
    {
        return view("pages.census.index", [
            'data' => $this->reportRepo->getCensusRecapitulations(),
            'payments' => Payment::pluck('name'),
            'rooms' => Room::pluck('name', 'id')->toArray(),
        ]);
    }
}
