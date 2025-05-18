<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientStoreRequest;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (!Gate::allows('isPetugasPendaftaran')) {
            abort(403);
        }

        if ($request->ajax()) {

            $patients = Patient::latest()->get();

            return DataTables::of($patients)
                ->addIndexColumn()
                ->setRowId('id')
                ->addColumn('Tgl lahir', function ($row) {
                    return date('d M Y', strtotime($row->tanggal_lahir));
                })
                ->addColumn('Wilayah', function ($row) {
                    return $row->region->kota_kabupaten;
                })
                ->addColumn('No_hp', function ($row) {
                    return Str::mask($row->no_hp, '*', -6);
                })
                ->addColumn('Aksi', function ($row) {
                    $detailUrl = route('patients.show', $row->slug);
                    $editUrl = route('patients.edit', $row->slug);

                    return '<div class="btn-group-sm" role="group">
                                <a href="' . $detailUrl . '"
                                    class="btn btn-success"><i class="bi bi-eye-fill"></i>
                                    Detail</a>
                                <a href="' . $editUrl . '"
                                    class="btn btn-warning"><i class="bi bi-pen"></i>
                                    Ubah</a>
                                <button class="btn btn-danger btn-delete" data-slug="' . $row->slug . '">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </div>';
                })
                ->rawColumns(['Aksi']) // penting agar HTML tidak di-escape
                ->make(true);
        }

        $title = 'Patient List';

        return view('dashboard.patient.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Gate::allows('isPetugasPendaftaran')) {
            abort(403);
        }

        $title = 'Create Patient';

        return view('dashboard.patient.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PatientStoreRequest $request)
    {
        if (!Gate::allows('isPetugasPendaftaran')) {
            abort(403);
        }

        $validatedData = $request->validated();

        Patient::create($validatedData);

        alert()->success('Buat Data Sukses!', 'Data Pasien telah ditambahkan.');

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        $title = 'Show Patient';

        return view('dashboard.patient.show', compact('title', 'patient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        if (!Gate::allows('isPetugasPendaftaran')) {
            abort(403);
        }

        $title = 'Edit Patient';

        return view('dashboard.patient.edit', compact('title', 'patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient)
    {
        if (!Gate::allows('isPetugasPendaftaran')) {
            abort(403);
        }

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required|max:255',
            'region_id' => 'required|exists:regions,id',
            'no_hp' => 'required|string|min:10|max:15',
        ]);

        if ($request->slug != $patient->slug || $request->nik != $patient->nik) {
            $request->validate([
                'slug' => 'required|unique:patients,slug',
                'nik' => 'required|numeric|digits:16|unique:patients,nik',
            ]);

            $validatedData['slug'] = $request->slug;
            $validatedData['nik'] = $request->nik;
        }

        Patient::where('id', $patient->id)->update($validatedData);

        alert()->success('Ubah Data Sukses!', 'Data Pasien telah diubah.');

        return redirect()->route('patients.index');
    }

    public function searchPatients(Request $request)
    {
        $search = $request->q;

        $results = Patient::where('name', 'like', "%$search%")
            ->limit(10)
            ->get(['id', 'name']);

        return response()->json($results);
    }

    public function destroy($slug)
    {
        $patient = Patient::where('slug', $slug)->firstOrFail();

        $patient->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus.']);
    }
}
