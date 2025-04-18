@extends('dashboard.layout.main')
@section('container')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Tindakan</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Tindakan</li>
        </ol>
        <div class="card text-bg-light mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Daftar Tindakan
            </div>
            <div class="d-flex justify-content-start">
                <div class="ms-3 mt-3">
                    <a href="{{ route('actions.create') }}" class="btn btn-primary btn-sm"><i class="bi bi-plus-lg"></i>
                        Tambah Tindakan</a>
                </div>
            </div>
            <div class="card-body">
                <table id="example" class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tindakan</th>
                            <th>Biaya</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($actions as $action)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $action->tindakan }}</td>
                            <td>Rp{{ number_format($action->biaya, 0, ',', '.') }}</td>
                            <td>{{ $action->keterangan }}</td>
                            <td>
                                <div class="btn-group-sm" role="group">
                                    <a href="{{ route('actions.edit', $action->slug) }}" class="btn btn-warning"><i
                                            class="bi bi-pen"></i>
                                        Ubah</a>
                                    @livewire('action-alert', ['actionId' => $action->id])
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Tindakan</th>
                            <th>Biaya</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection