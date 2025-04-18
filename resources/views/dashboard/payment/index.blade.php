@extends('dashboard.layout.main')
@section('container')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Pembayaran</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Pembayaran</li>
        </ol>
        <div class="card text-bg-light mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Daftar Pembayaran
            </div>
            <div class="card-body">
                <table id="example" class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pasien</th>
                            <th>Layanan</th>
                            <th>Biaya</th>
                            <th>Obat</th>
                            <th>Harga</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payments as $payment)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $payment->medicalrecord->registration->patient->name }}</td>
                            <td>{{ $payment->medicalrecord->action->tindakan }}</td>
                            <td>Rp{{ number_format($payment->medicalrecord->action->biaya, 0, ',', '.') }}</td>
                            <td>{{ $payment->medicalrecord->medicine->nama_obat }}</td>
                            <td>Rp{{ number_format($payment->medicalrecord->medicine->harga, 0, ',', '.') }}</td>
                            <td>Rp{{ number_format($payment->total, 0, ',', '.') }}</td>
                            <td>{{ $payment->status }}</td>
                            <td>
                                <form action="{{ route('payments.update', $payment->slug) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                    <input type="hidden" class="form-control" id="slug" name="slug"
                                        value="{{ $payment->slug }}" required>
                                    <button type="submit" class="btn btn-success btn-sm">
                                        Selesaikan Transaksi</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Pasien</th>
                            <th>Layanan</th>
                            <th>Biaya</th>
                            <th>Obat</th>
                            <th>Harga</th>
                            <th>Total</th>
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