<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\{Target, Nabung};
use Livewire\Attributes\{On};

class TargetDetail extends Component
{
    
    public $target, $jumlah, $id;
    
    
    public function mount($id){
        $this->id = $id;
        $this->target = Target::find($id);
    }

    public function nabung(){
        $this->validate([
            'jumlah'    => 'required|numeric'
        ]);
        $insert = Nabung::create([
            'user_id'   => 1,
            'target_id' => $this->id,
            'nilai'     => $this->jumlah,
            'tanggal'   => date('Y-m-d')
        ]);
        if($insert){
            $this->jumlah = '';
        }
    }

    #[On('update-target-detail')]
    public function update(){
        $this->target = Target::find($id);
    }

    public function render()
    {
        return view('livewire.target-detail', [
            'target'    => $this->target
        ]);
    }
}
