<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserChangePasswordComponent extends Component
{
    public $current_password;
    public $password;
    public $password_confirmation;

    public function updated($fields) {
    $this->validateOnly($fields,[
        'current_password' => 'required',
        'password' =>'required|min:8|confirmed|different:current_password',
    ]);
    }
    public function changePassword() {
            $this->validate([
                'current_password' => 'required',
                'password' =>'required|min:8|confirmed|different:current_password',

            ]);

            if(Hash::check($this->current_password,Auth::user()->password))
            {
                $user = User::findOrFail(Auth::user()->id);
                $user->password = Hash::make($this->password);
                $user->save();
                session()->flash('success','Password Berhasil di Ubah');
            }else
            {
                session()->flash('error','Password tidak sama');
            }
    }
    public function render()
    {
    return view('livewire.user-change-password-component')->layout('layouts.base');
    }
}
