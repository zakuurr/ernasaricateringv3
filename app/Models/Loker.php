<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loker extends Model
{
    use HasFactory;
    protected $table = "loker";

    protected $fillable = [
        'judul',
        'posisi_pekerjaan',
        'link_job',
        'deskripsi',
        'status',
        'foto'
    ];

   
}
