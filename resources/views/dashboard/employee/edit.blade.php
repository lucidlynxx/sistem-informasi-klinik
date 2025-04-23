@extends('dashboard.layout.main')

@section('container')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Pegawai</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Pegawai</li>
        </ol>
        <div class="card text-bg-light mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Ubah Pegawai
            </div>
            <div class="card-body">
                <form action="{{ route('employees.update', $employee->slug) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('put')
                    @csrf

                    <div class="mb-3 row">
                        <label for="nama"
                            class="col-sm-2 col-form-label text-end fw-semibold text-secondary">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('nama')
                                                                              is-invalid
                                                                          @enderror" id="nama" name="nama"
                                placeholder="Masukkan Nama" value="{{ old('nama', $employee->nama) }}" required>
                            @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <input type="hidden" class="form-control" id="slug" name="slug"
                        value="{{ old('slug', $employee->slug) }}" required>

                    <div class="mb-3 row">
                        <label for="nip" class="col-sm-2 col-form-label text-end fw-semibold text-secondary">NIP</label>
                        <div class="col-sm-10">
                            <input type="number"
                                class="form-control @error('nip')
                                                                                                                      is-invalid
                                                                                                                  @enderror" id="nip"
                                name="nip" placeholder="Masukkan NIP" value="{{ old('nip', $employee->nip) }}" required>
                            @error('nip')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="jabatan"
                            class="col-sm-2 col-form-label text-end fw-semibold text-secondary">Jabatan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('jabatan')
                                                                                                  is-invalid
                                                                                              @enderror" id="jabatan"
                                name="jabatan" placeholder="Masukkan Jabatan"
                                value="{{ old('jabatan', $employee->jabatan) }}" required>
                            @error('jabatan')
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
                                                                                              @enderror" id="alamat"
                                name="alamat" placeholder="Masukkan Alamat"
                                value="{{ old('alamat', $employee->alamat) }}" required>
                            @error('alamat')
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
                                value="{{ old('no_hp', $employee->no_hp) }}" required>
                            @error('no_hp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-sd-card-fill"></i>
                                    Tambah & tambah lagi</button>
                                <a href="{{ route('employees.index') }}" class="btn btn-danger btn-sm"><i
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
    const nama = document.querySelector("#nama");
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

        nama.addEventListener("keyup", () => {
            // let preslug = nama.value;
            // preslug = preslug.replace(/ /g,"-");
            preslug = generateString(8);
            slug.value = preslug.toLowerCase();
        });
</script>
@endpush