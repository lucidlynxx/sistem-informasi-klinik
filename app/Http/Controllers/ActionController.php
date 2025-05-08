<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActionStoreRequest;
use App\Models\Action;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ActionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Gate::allows('isDokter')) {
            abort(403);
        }

        $title = 'Action List';

        $actions = Action::latest()->take(100)->get();

        return view('dashboard.action.index', compact('title', 'actions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Gate::allows('isDokter')) {
            abort(403);
        }

        $title = 'Create Action';

        return view('dashboard.action.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ActionStoreRequest $request)
    {
        if (!Gate::allows('isDokter')) {
            abort(403);
        }

        $validatedData = $request->validated();

        Action::create($validatedData);

        alert()->success('Buat Data Sukses!', 'Data Tindakan telah ditambahkan.');

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Action $action)
    {
        if (!Gate::allows('isDokter')) {
            abort(403);
        }

        $title = 'Edit Action';

        return view('dashboard.action.edit', compact('title', 'action'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Action $action)
    {
        if (!Gate::allows('isDokter')) {
            abort(403);
        }
        $validatedData = $request->validate([
            'tindakan' => 'required|max:255',
            'biaya' => 'required|numeric',
            'keterangan' => 'required|max:255'
        ]);

        if ($request->slug != $action->slug) {
            $request->validate([
                'slug' => 'required|unique:actions,slug',
            ]);

            $validatedData['slug'] = $request->slug;
        }

        Action::where('id', $action->id)->update($validatedData);

        alert()->success('Ubah Data Sukses!', 'Data Tindakan telah diubah.');

        return redirect()->route('actions.index');
    }

    public function searchActions(Request $request)
    {
        $search = $request->q;

        $results = Action::where('tindakan', 'like', "%$search%")
            ->limit(10)
            ->get(['id', 'tindakan']);

        return response()->json($results);
    }
}
