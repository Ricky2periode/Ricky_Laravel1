<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Produk;

class DetailSales extends Model
{
    protected $table = 'detail_sales';

    protected $fillable = [
        'id_sales',
        'id_produk',
        'jumlah',
        'subtotal'
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }
}