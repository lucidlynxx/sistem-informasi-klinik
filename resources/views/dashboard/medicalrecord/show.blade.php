@extends('dashboard.layout.main')

@section('container')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Layanan Medis</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Layanan Medis</li>
        </ol>

        <div class="card text-bg-light mb-3" style="max-width: 40rem;">
            <div class="card-header">
                <h5>Profil Layanan Medis</h5>
            </div>
            <div class="card-body">
                <table class="table table-borderless mb-0">
                    <tr>
                        <th>Nama</th>
                        <td>: {{ $medicalrecord->registration->patient->name }}</td>
                    </tr>
                    <tr>
                        <th>NIK</th>
                        <td>: {{ $medicalrecord->registration->patient->nik }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir</th>
                        <td>: {{ date('d M Y', strtotime($medicalrecord->registration->patient->tanggal_lahir)) }}</td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td>: {{ $medicalrecord->registration->patient->jenis_kelamin }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>: {{ $medicalrecord->registration->patient->alamat }}</td>
                    </tr>
                    <tr>
                        <th>Wilayah</th>
                        <td>: {{ $medicalrecord->registration->patient->region->kota_kabupaten }}</td>
                    </tr>
                    <tr>
                        <th>No. HP</th>
                        <td>: {{ $medicalrecord->registration->patient->no_hp }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kunjungan</th>
                        <td>: {{ $medicalrecord->registration->jenis_kunjungan }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Daftar</th>
                        <td>: {{ date('d M Y', strtotime($medicalrecord->registration->tanggal_daftar)) }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>: {{ $medicalrecord->registration->status }}</td>
                    </tr>
                    <tr>
                        <th>Diagnosa</th>
                        <td>: {{ $medicalrecord->diagnosa }}</td>
                    </tr>
                    <tr>
                        <th>Catatan</th>
                        <td>: {{ $medicalrecord->catatan }}</td>
                    </tr>
                    <tr>
                        <th>Tindakan</th>
                        <td>: {{ $medicalrecord->action->tindakan }} (Rp{{ number_format($medicalrecord->action->biaya,
                            0, ',', '.') }})</td>
                    </tr>
                    <tr>
                        <th>Obat</th>
                        <td>: {{ $medicalrecord->medicine->nama_obat }} (Rp{{
                            number_format($medicalrecord->medicine->harga, 0, ',', '.') }})</td>
                    </tr>
                </table>
            </div>
        </div>

        <a href="{{ route('medicalrecords.index') }}" class="btn btn-danger btn-sm mb-3"><i
                class="bi bi-arrow-left"></i>
            Kembali</a>
    </div>
</main>
@endsection