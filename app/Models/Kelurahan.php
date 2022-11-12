<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    use HasFactory;
    public $timestamps = true;
    public $guarded = "id";
    protected $table = "kelurahans";

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class,'id_kecamatan');
    }

    public function order()
    {
        return $this->hasMany(Order::class,'id_kelurahan');
    }
    public function user()
    {
        return $this->hasMany(User::class,'id_kelurahan');
    }
}
