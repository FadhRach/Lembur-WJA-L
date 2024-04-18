<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;
    protected $table = "laporan";
    protected $primaryKey = "id_kegiatan";
    protected $fillable = [
        "id_kegiatan",
        "kgtn_tercapai",
        "deskripsi_hasil",
        "buktifoto"
    ];

    public function kegiatan() 
    { 
        return $this->belongsTo('App\Models\kegiatan','id_kegiatan'); 
    }

    
}
