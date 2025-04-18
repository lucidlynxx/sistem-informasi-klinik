<?php

namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Gate::allows('isKasir')) {
            abort(403);
        }

        $title = 'Payment List';

        $payments = Payment::latest()->take(100)->get();

        return view('dashboard.payment.index', compact('title', 'payments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        if (!Gate::allows('isKasir')) {
            abort(403);
        }

        if ($request->slug == $payment->slug) {
            $payment->status = 'lunas';
            $payment->save();

            alert()->success('Transaksi Selesai', 'Status pembayaran telah diubah menjadi lunas.');

            return back();
        }

        alert()->error('Transaksi Gagal', 'Status pembayaran tidak dapat diproses.');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
