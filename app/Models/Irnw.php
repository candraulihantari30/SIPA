<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Irnw extends Model
{
    use HasFactory;
    protected $table = "irnws";
    protected $primaryKey = "id_irnw";
    protected $fillable = [
        'nik_krama', 'status_krama', 'jumlah_iuran', 'status_pembayaran', 'pembayaran', 'periode', 'bukti_pembayaran', 'jenis'
    ];

    // public function krama()
    // {
    //     return $this->belongsTo(Krama::class, 'nik_krama');
    // }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_krama');
    }
}
