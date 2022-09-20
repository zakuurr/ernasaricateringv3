<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ongkir extends Model
{
    use HasFactory;

    protected $table = "ongkir";

    protected $fillable = [
        'jarak1',
        'jarak2',
        'harga_ongkir',
    ];

}
