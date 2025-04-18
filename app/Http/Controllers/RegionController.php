<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegionStoreRequest;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Gate::allows('isAdmin')) {
            abort(403);
        }

        $title = 'Region List';

        $regions = Region::latest()->take(100)->get();

        return view('dashboard.region.index', compact('title', 'regions'));
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
     * Display the specified resource.
     */
    public function show(Region $region)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Region $region)
    {
        //
    }
}
