<?php

namespace App\Http\Controllers\Admin;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use App\Repositories\PaymentRepository;

class PaymentController extends Controller
{

    protected PaymentRepository $paymentRepository;

    public function __construct()
    {
        $this->paymentRepository = new PaymentRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.payment.index',[
            'data' => $this->paymentRepository->getData()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.payment.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PaymentRequest $request)
    {
        $validated = $request->validated();
        $this->paymentRepository->create($validated);

        return to_route('admin.payment.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        $this->paymentRepository->destroy($payment);
        return response()->json(['success' => 'Data berhasil dihapus secara permanent']);
    }
}
