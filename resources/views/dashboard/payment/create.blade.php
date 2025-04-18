@extends('dashboard.layout.main')

@section('container')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tambah Data Pembayaran</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Pembayaran</li>
        </ol>
        <div class="card text-bg-light mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Tambah Pembayaran
            </div>
            <div class="card-body">
                <form action="{{ route('payments.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3 row">
                        <label for="medicalrecord_id"
                            class="col-sm-2 col-form-label text-end fw-semibold text-secondary">Pasien</label>
                        <div class="col-10">
                            <select class="form-select form-select-sm @error('medicalrecord_id')
                                    is-invalid
                                @enderror" id="medicalrecord_id" name="medicalrecord_id" required>
                                <option value="">-- Pilih Pasien Terdaftar --</option>
                                @foreach ($medicalrecords as $med)
                                @if (old('medicalrecord_id') == $med->id)
                                <option value="{{ $med->id }}" selected>{{ $med->registration->patient->name }}
                                </option>
                                @else
                                <option value="{{ $med->id }}">{{ $med->registration->patient->name }}</option>
                                @endif
                                @endforeach
                            </select>
                            @error('medicalrecord_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="total"
                            class="col-sm-2 col-form-label text-end fw-semibold text-secondary">Total</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control @error('total')
                                                        is-invalid
                                                    @enderror" id="total" name="total" placeholder="Masukkan Total"
                                value="{{ old('total') }}" required>
                            @error('total')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <input type="hidden" class="form-control" id="slug" name="slug" value="{{ old('slug') }}" required>

                    <div class="mb-3 row">
                        <label for="status"
                            class="col-sm-2 col-form-label text-end fw-semibold text-secondary">Status</label>
                        <div class="col-10">
                            <select class="form-select form-select-sm @error('status')
                                                            is-invalid
                                                        @enderror" id="status" name="status" required>
                                <option value="belum lunas" selected>Belum Lunas</option>
                                <option value="lunas">Lunas</option>
                            </select>
                            @error('status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary"><i class="bi bi-sd-card-fill"></i>
                                    Tambah & tambah lagi</button>
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
    const total = document.querySelector("#total");
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

        total.addEventListener("keyup", () => {
            // let preslug = total.value;
            // preslug = preslug.replace(/ /g,"-");
            preslug = generateString(8);
            slug.value = preslug.toLowerCase();
        });
</script>
@endpush