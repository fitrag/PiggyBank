<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $username, $password;

    public function login(){
        $credentials = $this->validate([
            'username'      => 'required',
            'password'      => 'required'
        ]);
        if(Auth::attempt($credentials)){
            $this->redirect(Dashboard::class, navigate:true);
        }else{

        }
    }
    public function render()
    {
        return view('livewire.login');
    }
}
