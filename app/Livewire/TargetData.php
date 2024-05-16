<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Target;

class TargetData extends Component
{
    public function render()
    {
        $targets = Target::with('nabungs')->where('user_id', auth()->user()->id)->get();
        return view('livewire.target-data', compact('targets'));
    }
}
