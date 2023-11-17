<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Repositories\ServiceRepository;

class ServiceController extends Controller
{

    protected ServiceRepository $serviceRepository;

    public function __construct()
    {
        $this->serviceRepository = new ServiceRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.service.index', [
            'data' => $this->serviceRepository->getData()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceRequest $request)
    {
        $validated = $request->validated();
        $this->serviceRepository->create($validated);

        return to_route('admin.service.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //
    }
}
