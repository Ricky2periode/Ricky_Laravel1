<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
use App\Models\DetailSales;

class Sales extends Model
{
    protected $table = 'sales';
    protected $primaryKey = 'id_sales';

    protected $fillable = [
        'id_customer',
        'tanggal_sales',
        'total_harga'
    ];

    public function getTanggalAttribute()
    {
        return $this->attributes['tanggal_sales'] ?? null;
    }

    public function setTanggalAttribute($value)
    {
        $this->attributes['tanggal_sales'] = $value;
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_customer');
    }

    public function detail()
    {
        return $this->hasOne(DetailSales::class, 'id_sales');
    }
}