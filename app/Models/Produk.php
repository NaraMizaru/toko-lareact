<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasUuids;

    protected $fillable = [
        'kategori_id',
        'kode',
        'nama',
        'deskripsi',
        'gambar',
        'harga'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
