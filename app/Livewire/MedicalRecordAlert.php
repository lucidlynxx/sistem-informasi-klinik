<?php

namespace App\Livewire;

use App\Models\MedicalRecord;
use Livewire\Component;

class MedicalRecordAlert extends Component
{
    public $medicalrecordId;

    public function render()
    {
        return view('livewire.medical-record-alert');
    }

    public function destroy($medicalrecordId)
    {
        MedicalRecord::find($medicalrecordId)->delete();

        return redirect()->route('medicalrecords.index');
    }
}
