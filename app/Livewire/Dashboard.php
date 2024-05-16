<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\{Target, Nabung};

class Dashboard extends Component
{
    public function render()
    {
        $targets = Target::with('nabungs')->where('user_id', auth()->user()->id)->get();
        $nabungs = Nabung::with('target')->where('user_id', auth()->user()->id)->limit(5)->latest()->get();
        return view('livewire.dashboard', compact('targets','nabungs'));
    }
}
