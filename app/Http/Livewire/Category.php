<?php

namespace App\Http\Livewire;

use App\Models\Backend\Kategori;
use App\Models\Backend\Menu as BackendMenu;
use Livewire\Component;
use Livewire\WithPagination;


class Category extends Component
{
    use WithPagination;

    public $searchTerm;
    public $id_kategori;
    public $search;
    protected $paginationTheme = 'bootstrap';

    public function mount($id_kategori) {
        $this->id_kategori = $id_kategori;
        $this->fill(request()->only('search'));
    }

        public function updatingSearch() {
        $this->resetPage();
        }
    public function render()
    {

        $kategori = Kategori::where('id',$this->id_kategori)->first();
        $id_kategori = $kategori->id;
        $kategori_nama = $kategori->kategori;
        return view('livewire.category',[
            'menus' => BackendMenu::where('nama_menu','LIKE','%'.$this->search.'%')->where('id_kategori',$id_kategori)->paginate(6),
            'menus2' => BackendMenu::inRandomOrder()->limit(3)->get(),
            'kategoris' => Kategori::all(),
            'kategori_nama' => $kategori_nama
        ])->layout('layouts.base');
    }
    public function paginationView()
    {
        return 'livewire.livewire-pagination-links';
    }
}
