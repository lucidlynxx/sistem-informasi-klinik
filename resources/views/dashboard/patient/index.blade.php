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
        <div class="card text-bg-light mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Daftar Pasien
            </div>
            <div class="d-flex justify-content-start">
                <div class="ms-3 mt-3">
                    <a href="{{ route('patients.create') }}" class="btn btn-primary btn-sm"><i
                            class="bi bi-plus-lg"></i>
                        Tambah Pasien</a>
                </div>
            </div>
            <div class="card-body">
                <table id="example" class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Tgl Lahir</th>
                            <th>Gender</th>
                            <th>Wilayah</th>
                            <th>No Hp</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($patients as $patient)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $patient->name }}</td>
                            <td>{{ date('d M Y', strtotime($patient->tanggal_lahir)); }}</td>
                            <td>{{ $patient->jenis_kelamin }}</td>
                            <td>{{ $patient->region->kota_kabupaten }}</td>
                            <td>{{ Str::mask($patient->no_hp, '*', -6) }}</td>
                            <td>
                                <div class="btn-group-sm" role="group">
                                    <a href="{{ route('patients.edit', $patient->slug) }}" class="btn btn-success"><i
                                            class="bi bi-eye-fill"></i>
                                        Detail</a>
                                    <a href="{{ route('patients.edit', $patient->slug) }}" class="btn btn-warning"><i
                                            class="bi bi-pen"></i>
                                        Ubah</a>
                                    @livewire('patient-alert', ['patientId' => $patient->id])
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Tgl Lahir</th>
                            <th>Gender</th>
                            <th>Wilayah</th>
                            <th>No Hp</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection