@extends('dashboard.layout.main')

@section('container')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Ubah Data Layanan Medis</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Layanan Medis</li>
        </ol>
        <div class="card text-bg-light mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Ubah Layanan Medis
            </div>
            <div class="card-body">
                <form action="{{ route('medicalrecords.update', $medicalrecord->slug) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('put')
                    @csrf

                    <div class="mb-3 row">
                        <label for="registration_id"
                            class="col-sm-2 col-form-label text-end fw-semibold text-secondary">Pasien</label>
                        <div class="col-10">
                            <select class="form-select form-select-sm @error('registration_id')
                                    is-invalid
                                @enderror" id="registration_id" name="registration_id" required>
                                <option value="">-- Pilih Pasien Terdaftar --</option>
                                @foreach ($registrations as $reg)
                                @if (old('registration_id', $medicalrecord->registration_id) == $reg->id)
                                <option value="{{ $reg->id }}" selected>{{ $reg->patient->name }}
                                </option>
                                @else
                                <option value="{{ $reg->id }}">{{ $reg->patient->name }}</option>
                                @endif
                                @endforeach
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
                                <option value="">-- Pilih Tindakan --</option>
                                @foreach ($actions as $act)
                                @if (old('action_id', $medicalrecord->action_id) == $act->id)
                                <option value="{{ $act->id }}" selected>{{ $act->tindakan }}
                                </option>
                                @else
                                <option value="{{ $act->id }}">{{ $act->tindakan }}</option>
                                @endif
                                @endforeach
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
                                <option value="">-- Pilih Obat --</option>
                                @foreach ($medicines as $med)
                                @if (old('medicine_id', $medicalrecord->medicine_id) == $med->id)
                                <option value="{{ $med->id }}" selected>{{ $med->nama_obat }}
                                </option>
                                @else
                                <option value="{{ $med->id }}">{{ $med->nama_obat }}</option>
                                @endif
                                @endforeach
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
                                placeholder="Masukkan Diagnosa" value="{{ old('diagnosa', $medicalrecord->diagnosa) }}"
                                required>
                            @error('diagnosa')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <input type="hidden" class="form-control" id="slug" name="slug"
                        value="{{ old('slug', $medicalrecord->slug) }}" required>

                    <div class="mb-3 row">
                        <label for="catatan"
                            class="col-sm-2 col-form-label text-end fw-semibold text-secondary">Catatan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('catatan')
                                                                                is-invalid
                                                                            @enderror" id="catatan" name="catatan"
                                placeholder="Masukkan Catatan" value="{{ old('catatan', $medicalrecord->catatan) }}">
                            @error('catatan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary"><i class="bi bi-sd-card-fill"></i>
                                    Ubah</button>
                                <a href="{{ route('medicalrecords.index') }}" class="btn btn-danger"><i
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