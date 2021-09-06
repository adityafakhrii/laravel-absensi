<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;
    protected $absensis = 'absensis';
    protected $fillable = ['id','user_id','tgl','masuk','keluar','status'];

    public function user(){    
        return $this->belongsTo('App\Models\User','user_id');
    }
}
