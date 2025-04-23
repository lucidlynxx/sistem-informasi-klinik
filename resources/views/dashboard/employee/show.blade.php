@extends('dashboard.layout.main')

@section('container')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Pegawai</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Pegawai</li>
        </ol>

        <div class="card text-bg-light mb-3" style="max-width: 30rem;">
            <div class="card-header">
                <h5>Profil Pegawai</h5>
            </div>
            <div class="card-body">
                <table class="table table-borderless mb-0">
                    <tr>
                        <th>Nama</th>
                        <td>: {{ $employee->nama }}</td>
                    </tr>
                    <tr>
                        <th>NIP</th>
                        <td>: {{ $employee->nip }}</td>
                    </tr>
                    <tr>
                        <th>Jabatan</th>
                        <td>: {{ $employee->jabatan }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>: {{ $employee->alamat }}</td>
                    </tr>
                    <tr>
                        <th>No. HP</th>
                        <td>: {{ $employee->no_hp }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <a href="{{ route('employees.index') }}" class="btn btn-danger btn-sm"><i class="bi bi-arrow-left"></i>
            Kembali</a>
    </div>
</main>
@endsection