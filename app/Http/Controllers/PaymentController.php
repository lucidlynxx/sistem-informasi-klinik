<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
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

    public function printPayment(Payment $payment)
    {
        $paymentData = Payment::find($payment->id);

        $customPaper = array(0, 0, 250, 400);

        $pdf = PDF::loadview('dashboard.payment.printpayment', ['payment' => $paymentData])->setPaper($customPaper, 'portrait');

        return $pdf->stream();
    }
}
