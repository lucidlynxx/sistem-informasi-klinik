<?php

namespace App\Livewire;

use App\Models\Region;
use Livewire\Component;

class RegionAlert extends Component
{
    public $regionId;

    public function render()
    {
        return view('livewire.region-alert');
    }

    public function destroy($regionId)
    {
        Region::find($regionId)->delete();

        return redirect()->route('regions.index');
    }
}
