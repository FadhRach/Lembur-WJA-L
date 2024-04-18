<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;
    protected $table = "kegiatan";
    protected $primaryKey = "id_kegiatan";
    protected $fillable = [
        "id_kegiatan",
        "id_user",
        "kegiatan",
        "deskripsi",
        "lokasi",
        "tgl_awal",
        "tgl_akhir",
        "ptgs_engineer",
        "ptgs_manager",
        "lama_kegiatan",
        "statacc_engineer",
        "statacc_manager",
        "kegiatan_stat"
    ];

    public function user() 
    { 
        return $this->belongsTo('App\Models\User','id_user'); 
    }

    public function engineer() 
    { 
        return $this->belongsTo('App\Models\User','ptgs_engineer'); 
    }

    public function manager() 
    { 
        return $this->belongsTo('App\Models\User','ptgs_manager'); 
    }

    public function laporan()
    {
        return $this->hasMany('App\Models\laporan', 'id_kegiatan');
    }
}
