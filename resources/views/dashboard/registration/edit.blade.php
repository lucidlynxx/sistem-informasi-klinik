@extends('dashboard.layout.main')

@section('container')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Ubah Data Pendaftaran</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Pendaftaran</li>
        </ol>
        <div class="card text-bg-light mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Ubah Pendaftaran
            </div>
            <div class="card-body">
                <form action="{{ route('registrations.update', $registration->slug) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('put')
                    @csrf

                    <div class="mb-3 row">
                        <label for="patient_id"
                            class="col-sm-2 col-form-label text-end fw-semibold text-secondary">Pasien</label>
                        <div class="col-10">
                            <select class="form-select form-select-sm @error('patient_id')
                                                                            is-invalid
                                                                        @enderror" id="patient_id" name="patient_id"
                                required>
                                <option value="">-- Pilih Pasien --</option>
                                @foreach ($patients as $patient)
                                @if (old('patient_id', $registration->patient_id) == $patient->id)
                                <option value="{{ $patient->id }}" selected>{{ $patient->name }}
                                </option>
                                @else
                                <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                                @endif
                                @endforeach
                            </select>
                            @error('patient_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="jenis_kunjungan"
                            class="col-sm-2 col-form-label text-end fw-semibold text-secondary">Jenis Kunjungan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('jenis_kunjungan')
                                    is-invalid
                                @enderror" id="jenis_kunjungan" name="jenis_kunjungan"
                                placeholder="Masukkan Jenis Kunjungan"
                                value="{{ old('jenis_kunjungan', $registration->jenis_kunjungan) }}" required>
                            @error('jenis_kunjungan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <input type="hidden" class="form-control" id="slug" name="slug"
                        value="{{ old('slug', $registration->slug) }}" required>

                    <div class="mb-3 row">
                        <label for="tanggal_daftar"
                            class="col-sm-2 col-form-label text-end fw-semibold text-secondary">Tanggal Daftar</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control @error('tanggal_daftar')
                                                          is-invalid
                                                      @enderror" id="tanggal_daftar" name="tanggal_daftar"
                                placeholder="Masukkan Tanggal Lahir"
                                value="{{ old('tanggal_daftar', $registration->tanggal_daftar) }}" required>
                            @error('tanggal_daftar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="status"
                            class="col-sm-2 col-form-label text-end fw-semibold text-secondary">Status</label>
                        <div class="col-10">
                            <select class="form-select form-select-sm @error('status')
                                    is-invalid
                                @enderror" id="status" name="status" required>
                                @if (old('status', $registration->status))
                                <option value="{{ $registration->status }}" selected>{{ $registration->status }}
                                </option>
                                @endif
                                <option value="menunggu">Menunggu</option>
                                <option value="selesai">Selesai</option>
                            </select>
                            @error('status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary"><i class="bi bi-sd-card-fill"></i>
                                    Ubah</button>
                                <a href="{{ route('registrations.index') }}" class="btn btn-danger"><i
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
    const jenis_kunjungan = document.querySelector("#jenis_kunjungan");
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

        jenis_kunjungan.addEventListener("keyup", () => {
            // let preslug = jenis_kunjungan.value;
            // preslug = preslug.replace(/ /g,"-");
            preslug = generateString(8);
            slug.value = preslug.toLowerCase();
        });
</script>
@endpush