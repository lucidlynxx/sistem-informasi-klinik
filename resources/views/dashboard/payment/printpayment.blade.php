<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Struk Tagihan</title>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            font-size: 11px;
            margin: 0;
            padding: 0;
        }

        .line {
            border-top: 1px dashed #000;
            margin: 10px 0;
        }

        .right {
            float: right;
        }

        .center {
            text-align: center;
        }

        p {
            margin: 7px 0;
        }
    </style>
</head>

<body>
    <p class="center"><strong>KLINIK SEHAT SENTOSA</strong></p>
    <p class="center">Jl. Melati No.6, Jakarta Timur</p>

    <div class="line"></div>

    <p><strong>Pasien:</strong> <span class="right">{{ $payment->medicalrecord->registration->patient->name
            }}</span></p>
    <p><strong>Diagnosa:</strong> <span class="right">{{ $payment->medicalrecord->diagnosa }}</span></p>
    <p><strong>Tindakan:</strong> <span class="right">{{ $payment->medicalrecord->action->tindakan }}</span></p>

    <p><strong>Biaya Tindakan:</strong>
        <span class="right">Rp{{ number_format($payment->medicalrecord->action->biaya, 0, ',', '.') }}</span>
    </p>

    <p><strong>Obat:</strong> <span class="right">{{ $payment->medicalrecord->medicine->nama_obat }}</span></p>

    <p><strong>Harga Obat:</strong>
        <span class="right">Rp{{ number_format($payment->medicalrecord->medicine->harga, 0, ',', '.')
            }}</span>
    </p>

    <div class="line"></div>

    <p><strong>Total Tagihan:</strong>
        <span class="right"><strong>Rp{{ number_format($payment->total, 0, ',', '.') }}</strong></span>
    </p>

    <p><strong>Status:</strong> <span class="right"><strong>{{ ucfirst($payment->status) }}</strong></span></p>

    <div class="line"></div>

    <p class="center"><strong>Catatan:</strong> {{ $payment->medicalrecord->catatan }}</p>

    <div class="line"></div>

    <p class="center">Terima kasih telah berkunjung</p>
    <p class="center">Semoga lekas sembuh</p>
</body>

</html>