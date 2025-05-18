<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationStoreRequest;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\DataTables;

class RegistrationController extends Controller
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

            $registrations = Registration::latest()->get();

            return Datatables::of($registrations)
                ->addIndexColumn()
                ->setRowId('id')
                ->addColumn('Pasien', function ($row) {
                    return $row->patient->name;
                })
                ->addColumn('Wilayah', function ($row) {
                    return $row->patient->region->kota_kabupaten;
                })
                ->addColumn('Tgl Daftar', function ($row) {
                    return date('d M y', strtotime($row->tanggal_daftar));
                })
                ->addColumn('Aksi', function ($row) {
                    $detailUrl = route('registrations.show', $row->slug);
                    $editUrl = route('registrations.edit', $row->slug);

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

        $title = 'Registration List';

        return view('dashboard.registration.index', compact('title'));
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

        return view('dashboard.registration.create', compact('title'));
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
        $title = 'Show Registration';

        return view('dashboard.registration.show', compact('title', 'registration'));
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

        return view('dashboard.registration.edit', compact('title', 'registration'));
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

    public function searchRegistrations(Request $request)
    {
        $search = $request->q;

        $results = Registration::where('status', 'menunggu')
            ->whereHas('patient', function ($query) use ($search) {
                $query->where('name', 'like', "%$search%");
            })
            ->orderBy('tanggal_daftar', 'desc') // urutkan dari yang terbaru
            ->limit(10)
            ->get()
            ->map(function ($registration) {
                return [
                    'id' => $registration->id,                 // ID dari registrations
                    'name' => $registration->patient->name     // Nama dari patients
                ];
            });

        return response()->json($results);
    }

    public function destroy($slug)
    {
        $registration = Registration::where('slug', $slug)->firstOrFail();

        $registration->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus.']);
    }
}
