<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Target;

class TargetData extends Component
{
    public function render()
    {
        $targets = Target::all();
        return view('livewire.target-data', compact('targets'));
    }
}
