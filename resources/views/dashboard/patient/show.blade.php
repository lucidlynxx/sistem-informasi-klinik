@extends('dashboard.layout.main')

@section('container')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Pasien</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Pasien</li>
        </ol>

        <div class="card text-bg-light mb-3" style="max-width: 30rem;">
            <div class="card-header">
                <h5>Profil Pasien</h5>
            </div>
            <div class="card-body">
                <table class="table table-borderless mb-0">
                    <tr>
                        <th>Nama</th>
                        <td>: {{ $patient->name }}</td>
                    </tr>
                    <tr>
                        <th>NIK</th>
                        <td>: {{ $patient->nik }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir</th>
                        <td>: {{ date('d M Y', strtotime($patient->tanggal_lahir)) }}</td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td>: {{ $patient->jenis_kelamin }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>: {{ $patient->alamat }}</td>
                    </tr>
                    <tr>
                        <th>Wilayah</th>
                        <td>: {{ $patient->region->kota_kabupaten }}</td>
                    </tr>
                    <tr>
                        <th>No. HP</th>
                        <td>: {{ $patient->no_hp }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <a href="{{ route('patients.index') }}" class="btn btn-danger btn-sm"><i class="bi bi-arrow-left"></i>
            Kembali</a>
    </div>
</main>
@endsection