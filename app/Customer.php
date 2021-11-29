<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'id_customer';
    public $incrementing = true;
    // public $timestamps = false;

    protected $fillable = [
        'nama',
        'alamat',
        'id_kelurahan'
    ];
}
