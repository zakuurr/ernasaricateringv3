<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OngkirFlat extends Model
{
    use HasFactory;

    protected $table = "ongkir_flat";

    protected $fillable = [
        'ongkir_flat',
    ];
}
