<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeStoreRequest;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Gate::allows('isAdmin')) {
            abort(403);
        }

        $title = 'Employee List';

        $employees = Employee::latest()->take(100)->get();

        return view('dashboard.employee.index', compact('title', 'employees'));
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
        //
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
