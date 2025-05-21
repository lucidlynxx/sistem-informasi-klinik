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

        <div class="card text-bg-light mb-3" style="max-width: 50rem;">
            <div class="card-header">
                <h5>Profil Tindakan</h5>
            </div>
            <div class="card-body">
                <table class="table table-borderless mb-0">
                    <tr>
                        <th>Tindakan</th>
                        <td>: {{ $action->tindakan }}</td>
                    </tr>
                    <tr>
                        <th>Biaya</th>
                        <td>: Rp{{ number_format($action->biaya, 0, ',', '.'); }}</td>
                    </tr>
                    <tr>
                        <th>Keterangan</th>
                        <td>: {{ $action->keterangan }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <a href="{{ route('actions.index') }}" class="btn btn-danger btn-sm mb-3"><i class="bi bi-arrow-left"></i>
            Kembali</a>
    </div>
</main>
@endsection