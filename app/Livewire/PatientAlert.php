<?php

namespace App\Livewire;

use App\Models\Patient;
use Livewire\Component;

class PatientAlert extends Component
{
    public $patientId;

    public function render()
    {
        return view('livewire.patient-alert');
    }

    public function destroy($patientId)
    {
        Patient::find($patientId)->delete();

        return redirect()->route('patients.index');
    }
}
