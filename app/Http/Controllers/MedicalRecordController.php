<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicalRecordStoreRequest;
use App\Models\MedicalRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\DataTables;

class MedicalRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (!Gate::allows('isDokter')) {
            abort(403);
        }

        if ($request->ajax()) {

            $medicalrecords = MedicalRecord::latest()->get();

            return DataTables::of($medicalrecords)
                ->addIndexColumn()
                ->setRowId('id')
                ->addColumn('Pasien', function ($row) {
                    return $row->registration->patient->name;
                })
                ->addColumn('Tindakan', function ($row) {
                    return $row->action->tindakan;
                })
                ->addColumn('Obat', function ($row) {
                    return $row->medicine->nama_obat;
                })
                ->addColumn('Aksi', function ($row) {
                    $detailUrl = route('medicalrecords.show', $row->slug);
                    $editUrl = route('medicalrecords.edit', $row->slug);

                    return '<div class="btn-group-sm" role="group">
                                <a href="' . $detailUrl . '"
                                    class="btn btn-success mb-1"><i class="bi bi-eye-fill"></i>
                                    Detail</a>
                                <a href="' . $editUrl . '"
                                    class="btn btn-warning mb-1"><i class="bi bi-pen"></i>
                                    Ubah</a>
                                <button class="btn btn-danger mb-1 btn-delete" data-slug="' . $row->slug . '">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </div>';
                })
                ->rawColumns(['Aksi']) // penting agar HTML tidak di-escape
                ->make(true);
        }

        $title = 'Medical Record List';

        return view('dashboard.medicalrecord.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Gate::allows('isDokter')) {
            abort(403);
        }

        $title = 'Create Medical Record';

        return view('dashboard.medicalrecord.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MedicalRecordStoreRequest $request)
    {
        if (!Gate::allows('isDokter')) {
            abort(403);
        }

        $validatedData = $request->validated();

        MedicalRecord::create($validatedData);

        alert()->success('Buat Data Sukses!', 'Data Layanan Medis telah ditambahkan.');

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(MedicalRecord $medicalrecord)
    {
        $title = 'Show Medical Record';

        return view('dashboard.medicalrecord.show', compact('title', 'medicalrecord'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MedicalRecord $medicalrecord)
    {
        if (!Gate::allows('isDokter')) {
            abort(403);
        }

        $title = 'Edit Medical Record';

        return view('dashboard.medicalrecord.edit', compact('title', 'medicalrecord'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MedicalRecord $medicalrecord)
    {
        if (!Gate::allows('isDokter')) {
            abort(403);
        }

        $validatedData = $request->validate([
            'registration_id' => 'required|exists:registrations,id',
            'action_id' => 'required|exists:actions,id',
            'medicine_id' => 'required|exists:medicines,id',
            'diagnosa' => 'required|max:255',
            'catatan' => 'nullable|string'
        ]);

        if ($request->slug != $medicalrecord->slug) {
            $request->validate([
                'slug' => 'required|unique:medicalrecords,slug',
            ]);

            $validatedData['slug'] = $request->slug;
        }

        MedicalRecord::where('id', $medicalrecord->id)->update($validatedData);

        alert()->success('Ubah Data Sukses!', 'Data Layanan Medis telah diubah.');

        return redirect()->route('medicalrecords.index');
    }

    public function destroy($slug)
    {
        $medicalrecord = MedicalRecord::where('slug', $slug)->firstOrFail();

        $medicalrecord->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus.']);
    }
}
