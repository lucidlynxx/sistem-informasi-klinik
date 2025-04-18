<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicalRecordStoreRequest;
use App\Models\Action;
use App\Models\MedicalRecord;
use App\Models\Medicine;
use App\Models\Payment;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class MedicalRecordController extends Controller
{
    private function calculatePayment($medicalRecord)
    {
        $actionCost = $medicalRecord->action ? $medicalRecord->action->biaya : 0;
        $medicineCost = $medicalRecord->medicine ? $medicalRecord->medicine->harga : 0;

        return $actionCost + $medicineCost;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Gate::allows('isDokter')) {
            abort(403);
        }

        $title = 'Medical Record List';

        $medicalRecords = MedicalRecord::latest()->take(100)->get();

        return view('dashboard.medicalrecord.index', compact('title', 'medicalRecords'));
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

        $registrations = Registration::where('status', 'menunggu')->get();
        $actions = Action::get();
        $medicines = Medicine::get();

        return view('dashboard.medicalrecord.create', compact('title', 'registrations', 'actions', 'medicines'));
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

        $medicalRecord = MedicalRecord::create($validatedData);

        $registration = Registration::find($validatedData['registration_id']);
        if ($registration) {
            $registration->status = 'selesai';
            $registration->save();
        }

        Payment::create([
            'medicalrecord_id' => $medicalRecord->id,
            'total' => $this->calculatePayment($medicalRecord),
            'slug' => Str::random(8),
            'status' => 'belum lunas',
        ]);

        alert()->success('Buat Data Sukses!', 'Data Layanan Medis telah ditambahkan.');

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(MedicalRecord $medicalRecord)
    {
        //
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

        $registrations = Registration::where('status', 'selesai')->get();
        $actions = Action::get();
        $medicines = Medicine::get();

        return view('dashboard.medicalrecord.edit', compact('title', 'registrations', 'actions', 'medicines', 'medicalrecord'));
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MedicalRecord $medicalRecord)
    {
        //
    }
}
