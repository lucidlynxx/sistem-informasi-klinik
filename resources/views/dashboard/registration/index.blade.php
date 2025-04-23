@extends('dashboard.layout.main')
@section('container')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Pendaftaran</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Pendaftaran</li>
        </ol>
        <div class="card text-bg-light mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Daftar Pendaftaran
            </div>
            <div class="d-flex justify-content-start">
                <div class="ms-3 mt-3">
                    <a href="{{ route('registrations.create') }}" class="btn btn-primary btn-sm"><i
                            class="bi bi-plus-lg"></i>
                        Tambah Pendaftaran</a>
                </div>
            </div>
            <div class="card-body">
                <table id="example" class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pasien</th>
                            <th>Wilayah</th>
                            <th>Kunjungan</th>
                            <th>Tgl Daftar</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($registrations as $registration)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $registration->patient->name }}</td>
                            <td>{{ $registration->patient->region->kota_kabupaten }}</td>
                            <td>{{ $registration->jenis_kunjungan }}</td>
                            <td>{{ date('d M y', strtotime($registration->tanggal_daftar)); }}</td>
                            <td>{{ $registration->status }}</td>
                            <td>
                                <div class="btn-group-sm" role="group">
                                    <a href="{{ route('registrations.show', $registration->slug) }}"
                                        class="btn btn-success"><i class="bi bi-eye-fill"></i>
                                        Detail</a>
                                    <a href="{{ route('registrations.edit', $registration->slug) }}"
                                        class="btn btn-warning"><i class="bi bi-pen"></i>
                                        Ubah</a>
                                    @livewire('registration-alert', ['registrationId' => $registration->id])
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Pasien</th>
                            <th>Wilayah</th>
                            <th>Kunjungan</th>
                            <th>Tgl Daftar</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection