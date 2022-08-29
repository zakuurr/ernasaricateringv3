<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = "kategori";
    protected $fillable = [
        'kategori',
        'nama_menu',
        'harga',
        'deskripsi',
        'quantity',
        'stock_status',
        'slug',
        'stock',
        'foto',
        'id_kategori'
    ];
    public function menus()
    {
        return $this->hasMany(Menu::class, 'id_kategori');
    }
}
