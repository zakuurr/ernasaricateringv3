<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rw extends Model
{
    use HasFactory;
    public $timestamps = true;
    public $guarded = "id";
    protected $table = "rws";

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class,'id_kelurahan');
    }

    public function order()
    {
        return $this->hasMany(Order::class,'id_rw');
    }
    public function user()
    {
        return $this->hasMany(User::class,'id_rw');
    }
}
