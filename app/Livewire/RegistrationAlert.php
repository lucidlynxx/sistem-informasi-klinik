<?php

namespace App\Livewire;

use App\Models\Registration;
use Livewire\Component;

class RegistrationAlert extends Component
{
    public $registrationId;

    public function render()
    {
        return view('livewire.registration-alert');
    }

    public function destroy($registrationId)
    {
        Registration::find($registrationId)->delete();

        return redirect()->route('registrations.index');
    }
}
