<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActionStoreRequest;
use App\Models\Action;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class ActionController extends Controller
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

            $actions = Action::latest()->get();

            return DataTables::of($actions)
                ->addIndexColumn()
                ->setRowId('id')
                ->addColumn('Biaya', function ($row) {
                    $formatRp = number_format($row->biaya, 0, ',', '.');
                    return "Rp$formatRp";
                })
                ->addColumn('Keterangan', function ($row) {
                    return Str::words($row->keterangan, 3, '...');
                })
                ->addColumn('Aksi', function ($row) {
                    $detailUrl = route('actions.show', $row->slug);
                    $editUrl = route('actions.edit', $row->slug);

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

        $title = 'Action List';

        return view('dashboard.action.index', compact('title'));
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

    public function show(Action $action)
    {
        $title = 'Show Patient';

        return view('dashboard.action.show', compact('title', 'action'));
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

    public function destroy($slug)
    {
        $action = Action::where('slug', $slug)->firstOrFail();

        $action->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus.']);
    }
}
