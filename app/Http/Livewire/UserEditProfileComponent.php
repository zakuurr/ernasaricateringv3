<?php

namespace App\Http\Livewire;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserEditProfileComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $alamat;
    public $nohp;
    public $email;
    public $newImage;
    public $foto;

    public function mount(){
        $user = User::find(Auth::user()->id);
        $this->name = $user->name;
        $this->alamat = $user->alamat ;
        $this->nohp = $user->nohp;
        $this->email = $user->email;
        $this->foto = $user->foto;
    }
public function updateProfile() {

    $user = User::find(Auth::user()->id);
    $user->name = $this->name;
    $user->save();

    if($this->newImage)
    {
        if($this->foto)
        {
            unlink('storage/fotouser/'.$this->foto);
        }
        $imageName = Carbon::now()->timestamp . '.' . $this->newImage->extension();
        $this->newImage->storeAs('storage/fotouser/',$imageName,'real_public');
        $user->foto = $imageName;
    }
    $user->alamat = $this->alamat;
    $user->nohp = $this->nohp;

    $user->save();
    session()->flash('message','Profil berhasil diubah');

}
    public function render()
    {
        return view('livewire.user-edit-profile-component')->layout('layouts.base');
    }
}
