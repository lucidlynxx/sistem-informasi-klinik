@extends('dashboard.layout.main')
@section('container')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Antrian Pasien</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Antrian Pasien</li>
        </ol>
        <div class="card text-bg-light mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Daftar Antrian Pasien
            </div>
            <div class="card-body">
                <table id="patientqueue-table" class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pasien</th>
                            <th>Gender</th>
                            <th>Tgl Lahir</th>
                            <th>Kunjungan</th>
                            <th>Tgl Daftar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Pasien</th>
                            <th>Gender</th>
                            <th>Tgl Lahir</th>
                            <th>Kunjungan</th>
                            <th>Tgl Daftar</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection

@push('yajra')
<script type="text/javascript">
    $(function () {
          
      var table = $('#patientqueue-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('patientqueue.index') }}",
          columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'Pasien', name: 'Pasien' },
            { data: 'Gender', name: 'Gender' },
            { data: 'Tgl Lahir', name: 'Tgl Lahir' },
            { data: 'jenis_kunjungan', name: 'jenis_kunjungan' },
            { data: 'Tgl Daftar', name: 'Tgl Daftar' },
            { data: 'Aksi', name: 'Aksi' },
          ]
      });
          
    });
</script>
@endpush