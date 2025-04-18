<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationStoreRequest;
use App\Models\Patient;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Gate::allows('isPetugasPendaftaran')) {
            abort(403);
        }

        $title = 'Registration List';

        $registrations = Registration::latest()->take(100)->get();

        return view('dashboard.registration.index', compact('title', 'registrations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Gate::allows('isPetugasPendaftaran')) {
            abort(403);
        }

        $title = 'Create Registration';

        $patients = Patient::get();

        return view('dashboard.registration.create', compact('title', 'patients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegistrationStoreRequest $request)
    {
        if (!Gate::allows('isPetugasPendaftaran')) {
            abort(403);
        }

        $validatedData = $request->validated();

        Registration::create($validatedData);

        alert()->success('Buat Data Sukses!', 'Data Pendaftaran telah ditambahkan.');

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Registration $registration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Registration $registration)
    {
        if (!Gate::allows('isPetugasPendaftaran')) {
            abort(403);
        }

        $title = 'Edit Patient';

        $patients = Patient::get();

        return view('dashboard.registration.edit', compact('title', 'registration', 'patients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Registration $registration)
    {
        if (!Gate::allows('isPetugasPendaftaran')) {
            abort(403);
        }

        $validatedData = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'jenis_kunjungan' => 'required|max:255',
            'tanggal_daftar' => 'required|date',
            'status' => 'required|in:menunggu,selesai',
        ]);

        if ($request->slug != $registration->slug) {
            $request->validate([
                'slug' => 'required|unique:registrations,slug',
            ]);

            $validatedData['slug'] = $request->slug;
        }

        Registration::where('id', $registration->id)->update($validatedData);

        alert()->success('Ubah Data Sukses!', 'Data Pendaftaran telah diubah.');

        return redirect()->route('registrations.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Registration $registration)
    {
        //
    }
}
