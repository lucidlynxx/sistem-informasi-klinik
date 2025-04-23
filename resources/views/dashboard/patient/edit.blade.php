@extends('dashboard.layout.main')

@section('container')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Ubah Data Pasien</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Pasien</li>
        </ol>
        <div class="card text-bg-light mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Ubah Pasien
            </div>
            <div class="card-body">
                <form action="{{ route('patients.update', $patient->slug) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('put')
                    @csrf

                    <div class="mb-3 row">
                        <label for="name"
                            class="col-sm-2 col-form-label text-end fw-semibold text-secondary">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('name')
                                                                              is-invalid
                                                                          @enderror" id="name" name="name"
                                placeholder="Masukkan Nama" value="{{ old('name', $patient->name) }}" required>
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <input type="hidden" class="form-control" id="slug" name="slug"
                        value="{{ old('slug', $patient->slug) }}" required>

                    <div class="mb-3 row">
                        <label for="nik" class="col-sm-2 col-form-label text-end fw-semibold text-secondary">NIK</label>
                        <div class="col-sm-10">
                            <input type="number"
                                class="form-control @error('nik')
                                                                                                                      is-invalid
                                                                                                                  @enderror" id="nik"
                                name="nik" placeholder="Masukkan NIK" value="{{ old('nik', $patient->nik) }}" required>
                            @error('nik')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="tanggal_lahir"
                            class="col-sm-2 col-form-label text-end fw-semibold text-secondary">Tanggal Lahir</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control @error('tanggal_lahir')
                                                          is-invalid
                                                      @enderror" id="tanggal_lahir" name="tanggal_lahir"
                                placeholder="Masukkan Tanggal Lahir"
                                value="{{ old('tanggal_lahir', $patient->tanggal_lahir) }}" required>
                            @error('tanggal_lahir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="jenis_kelamin"
                            class="col-sm-2 col-form-label text-end fw-semibold text-secondary">Gender</label>
                        <div class="col-10">
                            <select class="form-select form-select-sm @error('jenis_kelamin')
                                                                            is-invalid
                                                                        @enderror" id="jenis_kelamin"
                                name="jenis_kelamin" required>
                                <option value="">-- Pilih Gender --</option>
                                @if (old('jenis_kelamin', $patient->jenis_kelamin))
                                <option value="{{ $patient->jenis_kelamin }}" selected>{{ $patient->jenis_kelamin }}
                                </option>
                                @endif
                                <option value="L">L</option>
                                <option value="P">P</option>
                            </select>
                            @error('jenis_kelamin')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="alamat"
                            class="col-sm-2 col-form-label text-end fw-semibold text-secondary">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('alamat')
                                                                              is-invalid
                                                                          @enderror" id="alamat" name="alamat"
                                placeholder="Masukkan Alamat" value="{{ old('alamat', $patient->alamat) }}" required>
                            @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="region_id"
                            class="col-sm-2 col-form-label text-end fw-semibold text-secondary">Wilayah</label>
                        <div class="col-10">
                            <select class="form-select form-select-sm @error('region_id')
                                                        is-invalid
                                                    @enderror" id="region_id" name="region_id" required>
                                <option value="">-- Pilih Wilayah --</option>
                                @foreach ($regions as $region)
                                @if (old('region_id', $patient->region_id) == $region->id)
                                <option value="{{ $region->id }}" selected>{{ $region->kota_kabupaten }}
                                </option>
                                @else
                                <option value="{{ $region->id }}">{{ $region->kota_kabupaten }}</option>
                                @endif
                                @endforeach
                            </select>
                            @error('region_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="no_hp" class="col-sm-2 col-form-label text-end fw-semibold text-secondary">No
                            Hp</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control @error('no_hp')
                                                          is-invalid
                                                      @enderror" id="no_hp" name="no_hp" placeholder="Masukkan No Hp"
                                value="{{ old('no_hp', $patient->no_hp) }}" required>
                            @error('no_hp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-sd-card-fill"></i>
                                    Tambah & tambah lagi</button>
                                <a href="{{ route('patients.index') }}" class="btn btn-danger btn-sm"><i
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
    const name = document.querySelector("#name");
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

        name.addEventListener("keyup", () => {
            // let preslug = name.value;
            // preslug = preslug.replace(/ /g,"-");
            preslug = generateString(8);
            slug.value = preslug.toLowerCase();
        });
</script>
@endpush