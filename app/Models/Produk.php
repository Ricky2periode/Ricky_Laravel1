<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';
    protected $primaryKey = 'id_produk';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nama_produk',
        'harga',
        'stok',
        'deskripsi'
    ];

    public function getRouteKeyName()
    {
        return 'id_produk';
    }
}
