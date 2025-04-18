<?php

namespace App\Livewire;

use App\Models\Action;
use Livewire\Component;

class ActionAlert extends Component
{
    public $actionId;

    public function render()
    {
        return view('livewire.action-alert');
    }

    public function destroy($actionId)
    {
        Action::find($actionId)->delete();

        return redirect()->route('actions.index');
    }
}
