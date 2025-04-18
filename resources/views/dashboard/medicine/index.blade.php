@extends('dashboard.layout.main')
@section('container')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Obat</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Obat</li>
        </ol>
        <div class="card text-bg-light mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Daftar Obat
            </div>
            <div class="d-flex justify-content-start">
                <div class="ms-3 mt-3">
                    <a href="{{ route('medicines.create') }}" class="btn btn-primary btn-sm"><i
                            class="bi bi-plus-lg"></i>
                        Tambah Obat</a>
                </div>
            </div>
            <div class="card-body">
                <table id="example" class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Satuan</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($medicines as $medicine)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $medicine->nama_obat }}</td>
                            <td>{{ $medicine->satuan }}</td>
                            <td>Rp{{ number_format($medicine->harga, 0, ',', '.') }}</td>
                            <td>{{ $medicine->stok }}</td>
                            <td>
                                <div class="btn-group-sm" role="group">
                                    <a href="{{ route('medicines.edit', $medicine->slug) }}" class="btn btn-warning"><i
                                            class="bi bi-pen"></i>
                                        Ubah</a>
                                    @livewire('medicine-alert', ['medicineId' => $medicine->id])
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Satuan</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection