<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'alamat', 'kategori', 'user_id', 'totalmasuk', 'totalkeluar', 'totalorang', 'kapasitas'];
}
