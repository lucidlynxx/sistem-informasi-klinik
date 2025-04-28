<?php

namespace App\Observers;

use App\Models\MedicalRecord;
use App\Models\Medicine;
use App\Models\Payment;
use App\Models\Registration;
use Illuminate\Support\Str;

class MedicalRecordObserver
{
    /**
     * Handle the MedicalRecord "created" event.
     */
    public function created(MedicalRecord $medicalrecord): void
    {
        $registration = Registration::find($medicalrecord->registration_id);
        if ($registration) {
            $registration->status = 'selesai';
            $registration->save();
        }

        $medicine = Medicine::find($medicalrecord->medicine_id);
        if ($medicine) {
            $medicine->stok -= $medicalrecord->jumlah_obat;
            $medicine->save();
        }

        Payment::create([
            'medicalrecord_id' => $medicalrecord->id,
            'total' => $this->calculatePayment($medicalrecord),
            'slug' => Str::random(8),
            'status' => 'belum lunas',
        ]);
    }

    /**
     * Handle the MedicalRecord "updated" event.
     */
    public function updated(MedicalRecord $medicalrecord): void
    {
        // Cek apakah jumlah_obat berubah
        if ($medicalrecord->isDirty('jumlah_obat') || $medicalrecord->isDirty('medicine_id')) {

            // Ambil original data sebelum update
            $originalMedicineId = $medicalrecord->getOriginal('medicine_id');
            $originalJumlahObat = $medicalrecord->getOriginal('jumlah_obat');

            // Kalau medicine_id berubah, kita harus kembalikan stok lama dulu
            if ($originalMedicineId != $medicalrecord->medicine_id) {
                $originalMedicine = Medicine::find($originalMedicineId);
                if ($originalMedicine) {
                    $originalMedicine->stok += $originalJumlahObat;
                    $originalMedicine->save();
                }
            } else {
                // Kalau medicine_id tidak berubah, cuma update stok selisih jumlah obat
                $medicine = Medicine::find($medicalrecord->medicine_id);
                if ($medicine) {
                    $selisih = $originalJumlahObat - $medicalrecord->jumlah_obat;
                    $medicine->stok += $selisih;
                    $medicine->save();
                }
            }

            // Update stok medicine baru jika medicine_id berubah
            if ($originalMedicineId != $medicalrecord->medicine_id) {
                $newMedicine = Medicine::find($medicalrecord->medicine_id);
                if ($newMedicine) {
                    $newMedicine->stok -= $medicalrecord->jumlah_obat;
                    $newMedicine->save();
                }
            }
        }

        // Update total pembayaran juga kalau perlu
        $payment = Payment::where('medicalrecord_id', $medicalrecord->id)->first();
        if ($payment) {
            $payment->total = $this->calculatePayment($medicalrecord);
            $payment->save();
        }
    }

    /**
     * Handle the MedicalRecord "updated" event.
     */
    public function deleted(MedicalRecord $medicalrecord): void
    {
        // Kembalikan stok obat
        $medicine = Medicine::find($medicalrecord->medicine_id);
        if ($medicine) {
            $medicine->stok += $medicalrecord->jumlah_obat;
            $medicine->save();
        }

        // Hapus Payment yang berhubungan
        $payment = Payment::where('medicalrecord_id', $medicalrecord->id)->first();
        if ($payment) {
            $payment->delete();
        }
    }

    private function calculatePayment($medicalrecord)
    {
        $actionCost = $medicalrecord->action ? $medicalrecord->action->biaya : 0;
        $medicineCost = $medicalrecord->medicine ? $medicalrecord->medicine->harga : 0;
        $jumlahObat = $medicalrecord->jumlah_obat ? $medicalrecord->jumlah_obat : 0;

        return $actionCost + ($medicineCost * $jumlahObat);
    }
}
