<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Nabung;

class AnalyticsData extends Component
{
    public function render()
    {
        $nabungs = Nabung::with('target')->where('user_id', auth()->user()->id)->limit(5)->latest()->get();
        return view('livewire.analytics-data', compact('nabungs'));
    }
}
