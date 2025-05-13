@extends('dashboard.layout.main')

@section('container')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tambah Data Layanan Medis</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Layanan Medis</li>
        </ol>
        <div class="card text-bg-light mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Tambah Layanan Medis
            </div>
            <div class="card-body">
                <form action="{{ route('medicalrecords.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3 row">
                        <label for="registration_id"
                            class="col-sm-2 col-form-label text-end fw-semibold text-secondary">Pasien</label>
                        <div class="col-10">
                            <select class="form-select form-select-sm @error('registration_id')
                                    is-invalid
                                @enderror" id="registration_id" name="registration_id" required>
                            </select>
                            @error('registration_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="action_id"
                            class="col-sm-2 col-form-label text-end fw-semibold text-secondary">Tindakan</label>
                        <div class="col-10">
                            <select class="form-select form-select-sm @error('action_id')
                                    is-invalid
                                @enderror" id="action_id" name="action_id" required>
                            </select>
                            @error('action_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="medicine_id"
                            class="col-sm-2 col-form-label text-end fw-semibold text-secondary">Obat</label>
                        <div class="col-10">
                            <select class="form-select form-select-sm @error('medicine_id')
                                    is-invalid
                                @enderror" id="medicine_id" name="medicine_id" required>
                            </select>
                            @error('medicine_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="diagnosa"
                            class="col-sm-2 col-form-label text-end fw-semibold text-secondary">Diagnosa</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('diagnosa')
                                                        is-invalid
                                                    @enderror" id="diagnosa" name="diagnosa"
                                placeholder="Masukkan Diagnosa" value="{{ old('diagnosa') }}" required>
                            @error('diagnosa')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="jumlah_obat"
                            class="col-sm-2 col-form-label text-end fw-semibold text-secondary">Jumlah Obat</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control @error('jumlah_obat')
                                                        is-invalid
                                                    @enderror" id="jumlah_obat" name="jumlah_obat"
                                placeholder="Masukkan Diagnosa" value="{{ old('jumlah_obat') }}" required>
                            @error('jumlah_obat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <input type="hidden" class="form-control" id="slug" name="slug" value="{{ old('slug') }}" required>

                    <div class="mb-3 row">
                        <label for="catatan"
                            class="col-sm-2 col-form-label text-end fw-semibold text-secondary">Catatan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('catatan')
                                                                                is-invalid
                                                                            @enderror" id="catatan" name="catatan"
                                placeholder="Masukkan Catatan" value="{{ old('catatan') }}">
                            @error('catatan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-sd-card-fill"></i>
                                    Tambah & tambah lagi</button>
                                <a href="{{ route('medicalrecords.index') }}" class="btn btn-danger btn-sm"><i
                                        class="bi bi-x-circle"></i> Batal</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection

@push('slug')
<script>
    const diagnosa = document.querySelector("#diagnosa");
        const slug = document.querySelector('#slug');

        const characters ='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

        function generateString(length) {
            let result = '';
            const charactersLength = characters.length;
            for ( let i = 0; i < length; i++ ) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
            }

            return result;
        }

        diagnosa.addEventListener("keyup", () => {
            // let preslug = diagnosa.value;
            // preslug = preslug.replace(/ /g,"-");
            preslug = generateString(8);
            slug.value = preslug.toLowerCase();
        });
</script>
@endpush

@push('select2')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css"
    rel="stylesheet">
<script>
    $(document).ready(function() {
        $('#registration_id').select2({
        placeholder: 'Cari nama pasien terdaftar...',
        minimumInputLength: 5, // jumlah karakter sebelum pencarian dijalankan
        theme: 'bootstrap-5',
            ajax: {
                url: '/dashboard/searchregistrations',
                dataType: 'json',
                delay: 500,
                data: function (params) {
                    return {
                        q: params.term // query
                    };
                },
                processResults: function (data) {
                    return {
                        results: data.map(item => ({
                            id: item.id,
                            text: item.name
                        }))
                    };
                },
                cache: true
            }
        });
    });

    $(document).ready(function() {
        $('#action_id').select2({
        placeholder: 'Cari tindakan...',
        minimumInputLength: 5, // jumlah karakter sebelum pencarian dijalankan
        theme: 'bootstrap-5',
            ajax: {
                url: '/dashboard/searchactions',
                dataType: 'json',
                delay: 500,
                data: function (params) {
                    return {
                        q: params.term // query
                    };
                },
                processResults: function (data) {
                    return {
                        results: data.map(item => ({
                            id: item.id,
                            text: item.tindakan
                        }))
                    };
                },
                cache: true
            }
        });
    });

    $(document).ready(function() {
        $('#medicine_id').select2({
        placeholder: 'Cari obat...',
        minimumInputLength: 5, // jumlah karakter sebelum pencarian dijalankan
        theme: 'bootstrap-5',
            ajax: {
                url: '/dashboard/searchmedicines',
                dataType: 'json',
                delay: 500,
                data: function (params) {
                    return {
                        q: params.term // query
                    };
                },
                processResults: function (data) {
                    return {
                        results: data.map(item => ({
                            id: item.id,
                            text: item.nama_obat
                        }))
                    };
                },
                cache: true
            }
        });
    });
</script>
@endpush