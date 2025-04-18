<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicineStoreRequest;
use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Gate::allows('isDokter')) {
            abort(403);
        }

        $title = 'Medicine List';

        $medicines = Medicine::latest()->take(100)->get();

        return view('dashboard.medicine.index', compact('title', 'medicines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Gate::allows('isDokter')) {
            abort(403);
        }

        $title = 'Create Medicine';

        return view('dashboard.medicine.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MedicineStoreRequest $request)
    {
        if (!Gate::allows('isDokter')) {
            abort(403);
        }

        $validatedtData = $request->validated();

        Medicine::create($validatedtData);

        alert()->success('Buat Data Sukses!', 'Data Obat telah ditambahkan.');

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Medicine $medicine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medicine $medicine)
    {
        if (!Gate::allows('isDokter')) {
            abort(403);
        }

        $title = 'Edit Medicine';

        return view('dashboard.medicine.edit', compact('title', 'medicine'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Medicine $medicine)
    {
        if (!Gate::allows('isDokter')) {
            abort(403);
        }

        $validatedData = $request->validate([
            'nama_obat' => 'required|max:255',
            'satuan' => 'required|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric'
        ]);

        if ($request->slug != $medicine->slug) {
            $request->validate([
                'slug' => 'required|unique:medicines,slug',
            ]);

            $validatedData['slug'] = $request->slug;
        }

        Medicine::where('id', $medicine->id)->update($validatedData);

        alert()->success('Ubah Data Sukses!', 'Data Obat telah diubah.');

        return redirect()->route('medicines.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medicine $medicine)
    {
        //
    }
}
