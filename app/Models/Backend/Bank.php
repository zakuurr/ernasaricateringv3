<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;
   
    protected $table = "bank";

    protected $fillable = [
        'nama_bank',
        'label',
        'no_rekening',
        'atas_nama',
        'foto',
    ];
}
