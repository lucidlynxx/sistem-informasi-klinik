@extends('dashboard.layout.main')
@section('container')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Wilayah</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Wilayah</li>
        </ol>
        <div class="card text-bg-light mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Daftar Wilayah
            </div>
            <div class="d-flex justify-content-start">
                <div class="ms-3 mt-3">
                    <a href="{{ route('regions.create') }}" class="btn btn-primary btn-sm"><i class="bi bi-plus-lg"></i>
                        Tambah Wilayah</a>
                </div>
            </div>
            <div class="card-body">
                <table id="example" class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kota/Kabupaten</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($regions as $region)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $region->kota_kabupaten }}</td>
                            <td>
                                <div class="btn-group-sm" role="group">
                                    <a href="{{ route('regions.edit', $region->slug) }}" class="btn btn-warning"><i
                                            class="bi bi-pen"></i>
                                        Ubah</a>
                                    @livewire('region-alert', ['regionId' => $region->id])
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Kota/Kabupaten</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection