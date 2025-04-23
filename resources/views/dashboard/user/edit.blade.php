@extends('dashboard.layout.main')

@section('container')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data User</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">User</li>
        </ol>
        <div class="card text-bg-light mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Ubah User
            </div>
            <div class="card-body">
                <form action="{{ route('users.update', $user->slug) }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf

                    <div class="mb-3 row">
                        <label for="name"
                            class="col-sm-2 col-form-label text-end fw-semibold text-secondary">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('name')
                                  is-invalid
                              @enderror" id="name" value="{{ old('name', $user->name) }}" name="name" required>
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <input type="hidden" class="form-control" id="slug" name="slug"
                        value="{{ old('slug', $user->slug) }}" required>

                    <div class="mb-3 row">
                        <label for="email"
                            class="col-sm-2 col-form-label text-end fw-semibold text-secondary">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control @error('email')
                                                      is-invalid
                                                  @enderror" id="email" value="{{ old('email', $user->email) }}"
                                name="email" required>
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="role"
                            class="col-sm-2 col-form-label text-end fw-semibold text-secondary">Role</label>
                        <div class="col-10">
                            <select class="form-select form-select-sm @error('role')
                                is-invalid
                            @enderror" id="role" name="role" required>
                                <option value="">-- Pilih Alternatif --</option>
                                @if (old('role', $user->role))
                                <option value="{{ $user->role }}" selected>{{ $user->role }}
                                </option>
                                @endif
                                <option value="petugas_pendaftaran">Petugas Pendaftaran</option>
                                <option value="dokter">Dokter</option>
                                <option value="kasir">Kasir</option>
                                <option value="admin">Admin</option>
                            </select>
                            @error('role')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-sd-card-fill"></i>
                                    Ubah</button>
                                <a href="{{ route('users.index') }}" class="btn btn-danger btn-sm"><i
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
            let result = ' ';
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