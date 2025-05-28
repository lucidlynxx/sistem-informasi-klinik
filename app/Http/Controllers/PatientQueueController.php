<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\DataTables;

class PatientQueueController extends Controller
{
    public function index(Request $request)
    {
        if (!Gate::allows('isDokter')) {
            abort(403);
        }

        if ($request->ajax()) {

            $waitingLists = Registration::where('status', 'menunggu')->latest('tanggal_daftar')->get();

            return DataTables::of($waitingLists)
                ->addIndexColumn()
                ->setRowId('id')
                ->addColumn('Pasien', function ($row) {
                    return $row->patient->name;
                })
                ->addColumn('Gender', function ($row) {
                    return $row->patient->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan';
                })
                ->addColumn('Tgl Lahir', function ($row) {
                    return date('d M Y', strtotime($row->patient->tanggal_lahir));
                })
                ->addColumn('Tgl Daftar', function ($row) {
                    return date('d M Y', strtotime($row->tanggal_daftar));
                })
                ->addColumn('Aksi', function ($row) {
                    $createUrl = route('patientqueue.process', $row->slug);

                    return '<div class="btn-group-sm" role="group">
                                <a href="' . $createUrl . '" class="btn btn-info mb-1"><i class="bi bi-prescription2"></i> Periksa Pasien</a>
                            </div>';
                })
                ->rawColumns(['Aksi']) // penting agar HTML tidak di-escape
                ->make(true);
        }

        $title = 'Patient Queue List';

        return view('dashboard.patientqueue.index', compact('title'));
    }

    public function processingPatientQueue(Registration $registration)
    {
        if (!Gate::allows('isDokter')) {
            abort(403);
        }

        $title = 'Process Patient ' . $registration->patient->name;

        return view('dashboard.patientqueue.process', compact('title', 'registration'));
    }
}
