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
        <div class="card text-bg-light mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Daftar Layanan Medis
            </div>
            <div class="d-flex justify-content-start">
                <div class="ms-3 mt-3">
                    <a href="{{ route('medicalrecords.create') }}" class="btn btn-primary btn-sm"><i
                            class="bi bi-plus-lg"></i>
                        Tambah Layanan Medis</a>
                </div>
            </div>
            <div class="card-body">
                <table id="example" class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pasien</th>
                            <th>Tindakan</th>
                            <th>Obat</th>
                            <th>Diagnosa</th>
                            <th>Catatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($medicalRecords as $meds)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $meds->registration->patient->name }}</td>
                            <td>{{ $meds->action->tindakan }}</td>
                            <td>{{ $meds->medicine->nama_obat }}</td>
                            <td>{{ $meds->diagnosa }}</td>
                            <td>{{ $meds->catatan }}</td>
                            <td>
                                <div class="btn-group-sm" role="group">
                                    <a href="{{ route('medicalrecords.edit', $meds->slug) }}" class="btn btn-warning"><i
                                            class="bi bi-pen"></i>
                                        Ubah</a>
                                    @livewire('medical-record-alert', ['medicalrecordId' => $meds->id])
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Pasien</th>
                            <th>Tindakan</th>
                            <th>Obat</th>
                            <th>Diagnosa</th>
                            <th>Catatan</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection