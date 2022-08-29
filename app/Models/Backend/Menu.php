<?php

namespace App\Models\Backend;

use App\Models\PesananDetail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = "menu";

    protected $fillable = [
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

    public function kategori()
{
    return $this->belongsTo(Kategori::class, 'id_kategori');
}

public function pesanan_details()
{
    return $this->hasMany(PesananDetail::class, 'menu_id');
}

}
