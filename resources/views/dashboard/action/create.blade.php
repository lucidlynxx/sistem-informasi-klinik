@extends('dashboard.layout.main')

@section('container')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tambah Data Tindakan</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Tindakan</li>
        </ol>
        <div class="card text-bg-light mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Tambah Tindakan
            </div>
            <div class="card-body">
                <form action="{{ route('actions.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3 row">
                        <label for="tindakan"
                            class="col-sm-2 col-form-label text-end fw-semibold text-secondary">Tindakan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('tindakan')
                                                                              is-invalid
                                                                          @enderror" id="tindakan" name="tindakan"
                                placeholder="Masukkan Tindakan" value="{{ old('tindakan') }}" required>
                            @error('tindakan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <input type="hidden" class="form-control" id="slug" name="slug" value="{{ old('slug') }}" required>

                    <div class="mb-3 row">
                        <label for="biaya"
                            class="col-sm-2 col-form-label text-end fw-semibold text-secondary">Biaya</label>
                        <div class="col-sm-10">
                            <input type="number"
                                class="form-control @error('biaya')
                                                                                                                      is-invalid
                                                                                                                  @enderror" id="biaya"
                                name="biaya" placeholder="Masukkan Biaya" value="{{ old('biaya') }}" required>
                            @error('biaya')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="keterangan"
                            class="col-sm-2 col-form-label text-end fw-semibold text-secondary">Keterangan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('keterangan')
                                                          is-invalid
                                                      @enderror" id="keterangan" name="keterangan"
                                placeholder="Masukkan Keterangan" value="{{ old('keterangan') }}" required>
                            @error('keterangan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-sd-card-fill"></i>
                                    Tambah & tambah lagi</button>
                                <a href="{{ route('actions.index') }}" class="btn btn-danger btn-sm"><i
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
    const tindakan = document.querySelector("#tindakan");
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

        tindakan.addEventListener("keyup", () => {
            // let preslug = tindakan.value;
            // preslug = preslug.replace(/ /g,"-");
            preslug = generateString(8);
            slug.value = preslug.toLowerCase();
        });
</script>
@endpush