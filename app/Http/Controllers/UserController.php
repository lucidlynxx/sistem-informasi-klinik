<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class UserController extends Controller
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

            $users = User::latest()->get();

            return DataTables::of($users)
                ->addIndexColumn()
                ->setRowId('id')
                ->addColumn('Aksi', function ($row) {
                    $editUrl = route('users.edit', $row->slug);

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

        $title = 'User List';

        return view('dashboard.user.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Gate::allows('isAdmin')) {
            abort(403);
        }

        $title = 'Create User';

        return view('dashboard.user.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        if (!Gate::allows('isAdmin')) {
            abort(403);
        }

        $validatedData = $request->validated();

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        alert()->success('Buat Data Sukses!', 'Data User telah ditambahkan.');

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        if (!Gate::allows('isAdmin')) {
            abort(403);
        }

        $title = 'Edit User';

        return view('dashboard.user.edit', compact('title', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        if (!Gate::allows('isAdmin')) {
            abort(403);
        }

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'role' => 'required',
        ]);

        if ($request->slug != $user->slug || $request->email != $user->email) {
            $request->validate([
                'slug' => 'required|unique:users,slug',
                'email' => 'required|email|unique:users,email',
            ]);

            $validatedData['slug'] = $request->slug;
            $validatedData['email'] = $request->email;
        }

        User::where('id', $user->id)->update($validatedData);

        alert()->success('Ubah Data Sukses!', 'Data User telah diubah.');

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $user = User::where('slug', $slug)->firstOrFail();

        $user->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus.']);
    }
}
