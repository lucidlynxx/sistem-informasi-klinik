@extends('dashboard.layout.main')

@section('container')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Wilayah</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Wilayah</li>
        </ol>
        <div class="card text-bg-light mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Ubah Wilayah
            </div>
            <div class="card-body">
                <form action="{{ route('regions.update', $region->slug) }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf

                    <input type="hidden" class="form-control" id="slug" name="slug"
                        value="{{ old('slug', $region->slug) }}" required>

                    <div class="mb-3 row">
                        <label for="kota_kabupaten"
                            class="col-sm-2 col-form-label text-end fw-semibold text-secondary">Kabupaten/Kota</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('kota_kabupaten')
                                                                              is-invalid
                                                                          @enderror" id="kota_kabupaten"
                                value="{{ old('kota_kabupaten', $region->kota_kabupaten) }}" name="kota_kabupaten"
                                required>
                            @error('kota_kabupaten')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary"><i class="bi bi-sd-card-fill"></i>
                                    Ubah</button>
                                <a href="{{ route('regions.index') }}" class="btn btn-danger"><i
                                        class="bi bi-x-circle"></i>
                                    Batal</a>
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
    const kota_kabupaten = document.querySelector("#kota_kabupaten");
        const slug = document.querySelector('#slug');

        const characters ='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

        function generateString(length) {
            let result = ' ';
            const charactersLength = characters.length;
            for ( let i = 0; i < length; i++ ) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
            }

            return result;
        }

        kota_kabupaten.addEventListener("keyup", () => {
            // let preslug = kota_kabupaten.value;
            // preslug = preslug.replace(/ /g,"-");
            preslug = generateString(8);
            slug.value = preslug.toLowerCase();
        });
</script>
@endpush