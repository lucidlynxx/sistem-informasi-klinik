<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeStoreRequest;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class EmployeeController extends Controller
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

            $employees = Employee::latest()->get();

            return DataTables::of($employees)
                ->addIndexColumn()
                ->setRowId('id')
                ->addColumn('Nip', function ($row) {
                    return Str::mask($row->nip, '*', -8);
                })
                ->addColumn('No_hp', function ($row) {
                    return Str::mask($row->no_hp, '*', -6);
                })
                ->addColumn('Aksi', function ($row) {
                    $detailUrl = route('employees.show', $row->slug);
                    $editUrl = route('employees.edit', $row->slug);

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

        $title = 'Employee List';

        return view('dashboard.employee.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Gate::allows('isAdmin')) {
            abort(403);
        }

        $title = 'Create Employee';

        return view('dashboard.employee.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeStoreRequest $request)
    {
        if (!Gate::allows('isAdmin')) {
            abort(403);
        }

        $validatedData = $request->validated();

        Employee::create($validatedData);

        alert()->success('Buat Data Sukses!', 'Data Pegawai telah ditambahkan.');

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        $title = 'Show Employee';

        return view('dashboard.employee.show', compact('title', 'employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        if (!Gate::allows('isAdmin')) {
            abort(403);
        }

        $title = 'Edit Employee';

        return view('dashboard.employee.edit', compact('title', 'employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        if (!Gate::allows('isAdmin')) {
            abort(403);
        }

        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'jabatan' => 'required|max:255',
            'alamat' => 'required|max:255',
            'no_hp' => 'required|numeric'
        ]);

        if ($request->slug != $employee->slug || $request->nip != $employee->nip) {
            $request->validate([
                'slug' => 'required|unique:employees,slug',
                'nip' => 'required|numeric|unique:employess,nip',
            ]);

            $validatedData['slug'] = $request->slug;
            $validatedData['nip'] = $request->nip;
        }

        Employee::where('id', $employee->id)->update($validatedData);

        alert()->success('Ubah Data Sukses!', 'Data Pegawai telah diubah.');

        return redirect()->route('employees.index');
    }

    public function destroy($slug)
    {
        $user = Employee::where('slug', $slug)->firstOrFail();

        $user->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus.']);
    }
}
