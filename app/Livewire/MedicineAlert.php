<?php

namespace App\Livewire;

use App\Models\Medicine;
use Livewire\Component;

class MedicineAlert extends Component
{
    public $medicineId;

    public function render()
    {
        return view('livewire.medicine-alert');
    }

    public function destroy($medicineId)
    {
        Medicine::find($medicineId)->delete();

        return redirect()->route('medicines.index');
    }
}
