<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksis';
    protected $primaryKey = "id";
    protected $fillable = [
        'no_kwitansi', 'total', 'id_user', 'id_prajuru', 'tgl_transaksi'
    ];

    public function dataKrama()
    {
        return $this->belongsTo(Krama::class, 'id_user');
    }

    public function dataPrajuru()
    {
        return $this->belongsTo(PrajuruAdat::class, 'id_prajuru');
    }

    public function detail()
    {
        return $this->belongsTo(Detail::class, 'id');
    }
}
