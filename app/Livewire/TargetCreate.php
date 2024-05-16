<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Target;

class TargetCreate extends Component
{
    public $nama, $target, $foto;

    protected $rules = [
        'nama'      => 'required',
        'target'    => 'required'
    ];
    public function save(){
        $this->validate();
        $insert = Target::create([
            'user_id'   => 1,
            'nama'      => $this->nama,
            'target'    => $this->target,
            'foto'      => $this->foto,
        ]);
        if($insert){
            $this->redirect(TargetData::class, navigate:true);
        }

    }
    public function render()
    {
        return view('livewire.target-create');
    }
}
