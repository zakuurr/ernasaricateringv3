<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;

class Dropdowns extends Component
{
    public $provinsis;
    public $kotas;
    public $kecamatans;
    public $kelurahans;


    public $selectedProvinsi = null;
    public $selectedKota = null;
    public $selectedKecamatan = null;
    public $selectedKelurahan = null;

    public function mount($selectedKelurahan = null)
    {
        $this->provinsis = Provinsi::all();
        $this->kotas = collect();
        $this->kecamatans = collect();
        $this->kelurahans = collect();
        $this->selectedKelurahan = $selectedKelurahan;

        if(!is_null($selectedKelurahan))
        {
            $kel = Kelurahan::with('kecamatan.kota.provinsi')->find($selectedKelurahan);
            if($kel)
            {

                $this->kelurahans = Kelurahan::where('id_kecamatan',$kel->kelurahan->id_kecamatan)->get();
                $this->kecamatans = Kecamatan::where('id_kota',$kel->kelurahan->kecamatan->id_kota)->get();
                $this->kotas = Kota::where('id_provinsi',$kel->kelurahan->kecamatan->kota->id_provinsi)->get();
                $this->SelectedProvinsi = $kel->kelurahan->kecamatan->kota->id_provinsi;
                $this->SelectedKota = $kel->kelurahan->kecamatan->id_kota;
                $this->SelectedKecamatan = $kel->kelurahan->id_kecamatan;
                $this->SelectedKelurahan = $kel->id_kelurahan;
            }
        }

    }

    public function render()
    {
        return view('livewire.dropdowns')->layout('layouts.base');
    }

    public function updatedSelectedProvinsi($provinsi)
    {
        $this->kotas = Kota::where('id_provinsi',$provinsi)->get();
        $this->selectedKecamatan = NULL;
        $this->selectedKelurahan = NULL;

    }

    public function updatedSelectedKota($kota)
    {
        $this->kecamatans = Kecamatan::where('id_kota',$kota)->get();
        $this->selectedKelurahan = NULL;

    }

    public function updatedSelectedKecamatan($kecamatan)
    {
        $this->kelurahans = Kelurahan::where('id_kecamatan',$kecamatan)->get();

    }


}
