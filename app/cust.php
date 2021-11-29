<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cust extends Model
{
    // use SoftDeletes;
    protected $table ='cust';
    //protected $primaryKey = 'id_customer';  
    protected $fillable = ['id_customer','nama','alamat','kodepos'];    
    //public $timestamps = false;
    //protected $data=['deleted_at'];
    protected $guarded = [];
}
