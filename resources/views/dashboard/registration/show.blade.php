@extends('dashboard.layout.main')

@section('container')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Pendaftaran Pasien</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Pendaftaran Pasien</li>
        </ol>

        <div class="card text-bg-light mb-3" style="max-width: 30rem;">
            <div class="card-header">
                <h5>Profil Pendaftaran Pasien</h5>
            </div>
            <div class="card-body">
                <table class="table table-borderless mb-0">
                    <tr>
                        <th>Nama</th>
                        <td>: {{ $registration->patient->name }}</td>
                    </tr>
                    <tr>
                        <th>NIK</th>
                        <td>: {{ $registration->patient->nik }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir</th>
                        <td>: {{ date('d M Y', strtotime($registration->patient->tanggal_lahir)) }}</td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td>: {{ $registration->patient->jenis_kelamin }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>: {{ $registration->patient->alamat }}</td>
                    </tr>
                    <tr>
                        <th>Wilayah</th>
                        <td>: {{ $registration->patient->region->kota_kabupaten }}</td>
                    </tr>
                    <tr>
                        <th>No. HP</th>
                        <td>: {{ $registration->patient->no_hp }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kunjungan</th>
                        <td>: {{ $registration->jenis_kunjungan }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Daftar</th>
                        <td>: {{ date('d M Y', strtotime($registration->tanggal_daftar)) }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>: {{ $registration->status }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <a href="{{ route('registrations.index') }}" class="btn btn-danger btn-sm mb-3"><i class="bi bi-arrow-left"></i>
            Kembali</a>
    </div>
</main>
@endsection