<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegionStoreRequest;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\DataTables;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (!Gate::allows('isAdmin')) {
            abort(403);
        }

        if ($request->ajax()) {

            $regions = Region::latest()->get();

            return DataTables::of($regions)
                ->addIndexColumn()
                ->setRowId('id')
                ->addColumn('Aksi', function ($row) {
                    $editUrl = route('regions.edit', $row->slug);

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

        $title = 'Region List';

        return view('dashboard.region.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Gate::allows('isAdmin')) {
            abort(403);
        }

        $title = 'Create Region';

        return view('dashboard.region.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegionStoreRequest $request)
    {
        if (!Gate::allows('isAdmin')) {
            abort(403);
        }

        $validatedData = $request->validated();

        Region::create($validatedData);

        alert()->success('Buat Data Sukses!', 'Data Wilayah telah ditambahkan.');

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Region $region)
    {
        if (!Gate::allows('isAdmin')) {
            abort(403);
        }

        $title = 'Edit Region';

        return view('dashboard.region.edit', compact('title', 'region'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Region $region)
    {
        if (!Gate::allows('isAdmin')) {
            abort(403);
        }

        $validatedData = $request->validate([
            'kota_kabupaten' => 'required|max:255',
        ]);

        if ($request->slug != $region->slug) {
            $request->validate([
                'slug' => 'required|unique:regions,slug'
            ]);

            $validatedData['slug'] = $request->slug;
        }

        Region::where('id', $region->id)->update($validatedData);

        alert()->success('Ubah Data Sukses!', 'Data Wilayah telah diubah.');

        return redirect()->route('regions.index');
    }

    public function searchRegions(Request $request)
    {
        $search = $request->q;

        $results = Region::where('kota_kabupaten', 'like', "%$search%")
            ->limit(10)
            ->get(['id', 'kota_kabupaten']);

        return response()->json($results);
    }

    public function destroy($slug)
    {
        $region = Region::where('slug', $slug)->firstOrFail();

        $region->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus.']);
    }
}
