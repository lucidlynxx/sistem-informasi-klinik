<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicineStoreRequest;
use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\DataTables;

class MedicineController extends Controller
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

            $medicines = Medicine::latest()->get();

            return DataTables::of($medicines)
                ->addIndexColumn()
                ->setRowId('id')
                ->addColumn('Harga', function ($row) {
                    $formatRp = number_format($row->harga, 0, ',', '.');
                    return "Rp$formatRp";
                })
                ->addColumn('Aksi', function ($row) {
                    $editUrl = route('medicines.edit', $row->slug);

                    return '<div class="btn-group-sm" role="group">
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

        $title = 'Medicine List';

        return view('dashboard.medicine.index', compact('title'));
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

    public function searchMedicines(Request $request)
    {
        $search = $request->q;

        $results = Medicine::where('stok', '>', 0)
            ->where('nama_obat', 'like', "%$search%")
            ->limit(10)
            ->get(['id', 'nama_obat']);

        return response()->json($results);
    }

    public function destroy($slug)
    {
        $medicine = Medicine::where('slug', $slug)->firstOrFail();

        $medicine->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus.']);
    }
}
