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
                <table id="region-table" class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kota/Kabupaten</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
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

@push('yajra')
<script type="text/javascript">
    $(function () {
          
      var table = $('#region-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('regions.index') }}",
          columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'kota_kabupaten', name: 'kota_kabupaten' },
            { data: 'Aksi', name: 'Aksi', orderable: false, searchable: false }
          ]
      });
          
    });

    $(document).ready(function () {
        // Tombol delete
        $('#region-table').on('click', '.btn-delete', function () {
            const slug = $(this).data('slug');
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/dashboard/regions/${slug}`,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (response) {
                            if (response.success) {
                                Swal.fire('Terhapus!', response.message, 'success');
                                $('#region-table').DataTable().ajax.reload(null, false);
                            }
                        },
                        error: function () {
                            Swal.fire('Gagal!', 'Data tidak bisa dihapus.', 'error');
                        }
                    });
                }
            });
        });
    });
</script>
@endpush