<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{
    public $nama, $username, $password;

    protected $rules = [
        'nama'      => 'required',
        'username'  => 'required',
        'password'  => 'required',
    ];
    public function register(){
        $insert = User::create([
            'nama'      => $this->nama,
            'username'  => $this->username,
            'password'  => Hash::make($this->password),
        ]);
        if($insert){
            $this->redirect(Login::class, navigate:true);
        }
    }
    public function render()
    {
        return view('livewire.register');
    }
}
