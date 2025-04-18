@extends('dashboard.layout.main')

@section('container')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Ubah Data Obat</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Obat</li>
        </ol>
        <div class="card text-bg-light mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Ubah Obat
            </div>
            <div class="card-body">
                <form action="{{ route('medicines.update', $medicine->slug) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('put')
                    @csrf

                    <div class="mb-3 row">
                        <label for="nama_obat" class="col-sm-2 col-form-label text-end fw-semibold text-secondary">Nama
                            Obat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('nama_obat')
                                                                              is-invalid
                                                                          @enderror" id="nama_obat" name="nama_obat"
                                placeholder="Masukkan Nama Obat" value="{{ old('nama_obat', $medicine->nama_obat) }}"
                                required>
                            @error('nama_obat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <input type="hidden" class="form-control" id="slug" name="slug"
                        value="{{ old('slug', $medicine->slug) }}" required>

                    <div class="mb-3 row">
                        <label for="satuan"
                            class="col-sm-2 col-form-label text-end fw-semibold text-secondary">Satuan</label>
                        <div class="col-sm-10">
                            <input type="text"
                                class="form-control @error('satuan')
                                                                                                                      is-invalid
                                                                                                                  @enderror"
                                id="satuan" name="satuan" placeholder="Masukkan Satuan"
                                value="{{ old('satuan', $medicine->satuan) }}" required>
                            @error('satuan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="harga"
                            class="col-sm-2 col-form-label text-end fw-semibold text-secondary">Harga</label>
                        <div class="col-sm-10">
                            <input type="number"
                                class="form-control @error('harga')
                                                                                                                      is-invalid
                                                                                                                  @enderror" id="harga"
                                name="harga" placeholder="Masukkan Satuan" value="{{ old('harga', $medicine->harga) }}"
                                required>
                            @error('harga')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="stok"
                            class="col-sm-2 col-form-label text-end fw-semibold text-secondary">Stok</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control @error('stok')
                                                          is-invalid
                                                      @enderror" id="stok" name="stok"
                                placeholder="Masukkan Keterangan" value="{{ old('stok', $medicine->stok) }}" required>
                            @error('stok')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary"><i class="bi bi-sd-card-fill"></i>
                                    Tambah & tambah lagi</button>
                                <a href="{{ route('medicines.index') }}" class="btn btn-danger"><i
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
    const nama_obat = document.querySelector("#nama_obat");
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

        nama_obat.addEventListener("keyup", () => {
            // let preslug = nama_obat.value;
            // preslug = preslug.replace(/ /g,"-");
            preslug = generateString(8);
            slug.value = preslug.toLowerCase();
        });
</script>
@endpush