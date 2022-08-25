<?php

namespace App\Http\Livewire;

use App\Models\Backend\Kategori;
use App\Models\Backend\Menu as BackendMenu;
use Livewire\Component;
use Livewire\WithPagination;


class Menu extends Component
{
    use WithPagination;

    public $searchTerm;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.menu',[
            'menus' => BackendMenu::paginate(6),
            'kategoris' => Kategori::all()
        ])->layout('layouts.base');
    }
    public function paginationView()
    {
        return 'livewire.livewire-pagination-links';
    }
}
