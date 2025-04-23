<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientStoreRequest;
use App\Models\Patient;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Gate::allows('isPetugasPendaftaran')) {
            abort(403);
        }

        $title = 'Patient List';

        $patients = Patient::latest()->take(100)->get();

        return view('dashboard.patient.index', compact('title', 'patients'));
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

        $regions = Region::get();

        return view('dashboard.patient.create', compact('title', 'regions'));
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

        $regions = Region::get();

        return view('dashboard.patient.edit', compact('title', 'patient', 'regions'));
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
}
