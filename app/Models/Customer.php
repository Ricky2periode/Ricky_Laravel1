<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Sales;

class Customer extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'id_customer';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nama_customer',
        'alamat',
        'no_hp',
        'email'
    ];

    public function getRouteKeyName()
    {
        return 'id_customer';
    }

    public function sales()
    {
        return $this->hasMany(Sales::class, 'id_customer');
    }
}