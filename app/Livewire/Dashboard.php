<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\{Target, Nabung};

class Dashboard extends Component
{
    public function render()
    {
        $targets = Target::all();
        $nabungs = Nabung::limit(5)->latest()->get();
        return view('livewire.dashboard', compact('targets','nabungs'));
    }
}
