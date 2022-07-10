<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Kegiatan extends Model
{
    use HasFactory;
    protected $table = 'kegiatans';
    protected $primaryKey = "id_kegiatan";
    protected $fillable = [
        'nm_kgtn', 'tmpt', 'tgl', 'jam', 'interval', 'peserta'
    ];

    // public function getTglAttribute()
    // {
    //     return Carbon::parse($this->attributes['tgl'])->isoFormat('dddd, D MMMM Y');
    // }
}
