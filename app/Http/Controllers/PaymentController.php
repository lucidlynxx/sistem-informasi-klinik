<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\DataTables;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (!Gate::allows('isKasir')) {
            abort(403);
        }

        if ($request->ajax()) {

            $payments = Payment::latest()->get();

            return DataTables::of($payments)
                ->addIndexColumn()
                ->setRowId('id')
                ->addColumn('Pasien', function ($row) {
                    return $row->medicalrecord->registration->patient->name;
                })
                ->addColumn('Layanan', function ($row) {
                    return $row->medicalrecord->action->tindakan . ' (Rp' . number_format($row->medicalrecord->action->biaya, 0, ',', '.') . ')';
                })
                ->addColumn('Obat', function ($row) {
                    return $row->medicalrecord->medicine->nama_obat . ' (Rp' . number_format($row->medicalrecord->medicine->harga, 0, ',', '.') . ')';
                })
                ->addColumn('Total', function ($row) {
                    return 'Rp' . number_format($row->total, 0, ',', '.');
                })
                ->addColumn('Aksi', function ($row) {
                    if ($row->status == 'belum lunas') {
                        $updateUrl = route('payments.update', $row->slug);
                        $csrf = csrf_field(); // ini akan mengembalikan input _token
                        $method = method_field('PUT');

                        return '<div class="btn-group-sm" role="group">
                                    <form action="' . $updateUrl . '" method="POST" enctype="multipart/form-data">
                                        ' . $method . '
                                        ' . $csrf . '
                                        <input type="hidden" class="form-control" id="slug" name="slug" value="' . $row->slug . '" required>
                                        <button type="submit" class="btn btn-success btn-sm">Selesaikan Transaksi</button>
                                    </form>
                                </div>';
                    } else {
                        $printUrl = route('payments.print', $row->slug);

                        return '<a href="' . $printUrl . '" target="_blank" class="btn btn-primary btn-sm">Cetak Receipt</a>';
                    }
                })
                ->rawColumns(['Aksi']) // penting agar HTML tidak di-escape
                ->make(true);
        }

        $title = 'Payment List';

        return view('dashboard.payment.index', compact('title'));
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
