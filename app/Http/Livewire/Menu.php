<?php

namespace App\Http\Livewire;

use App\Models\Backend\Kategori;
use App\Models\Backend\Menu as BackendMenu;
use Livewire\Component;
use Livewire\WithPagination;


class Menu extends Component
{
    use WithPagination;

    public $search;

    protected $paginationTheme = 'bootstrap';

    public function mount() {
    $this->fill(request()->only('search'));
    }

    public function updatingSearch() {
    $this->resetPage();
    }
    public function render()
    {

        return view('livewire.menu',[
            'menus' => BackendMenu::where('nama_menu','LIKE','%'.$this->search.'%')->paginate(6),
            'menus2' => BackendMenu::where('id_kategori',3)->paginate(3),
            'kategoris' => Kategori::all()
        ])->layout('layouts.base');
    }
    public function paginationView()
    {
        return 'livewire.livewire-pagination-links';
    }
}
