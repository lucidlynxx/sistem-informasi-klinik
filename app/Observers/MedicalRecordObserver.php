<?php

namespace App\Observers;

use App\Models\MedicalRecord;
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

        Payment::create([
            'medicalrecord_id' => $medicalrecord->id,
            'total' => $this->calculatePayment($medicalrecord),
            'slug' => Str::random(8),
            'status' => 'belum lunas',
        ]);
    }

    private function calculatePayment($medicalrecord)
    {
        $actionCost = $medicalrecord->action ? $medicalrecord->action->biaya : 0;
        $medicineCost = $medicalrecord->medicine ? $medicalrecord->medicine->harga : 0;

        return $actionCost + $medicineCost;
    }
}
