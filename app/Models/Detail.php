<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;
    protected $table = 'details';
    protected $primaryKey = "id_detail";
    protected $fillable = [
        'transaksi_id', 'jenis', 'periode', 'nominal'
    ];

    public function transaksi()
    {
        return $this->hasMany(transaksi::class, 'transaksi_id');
    }
}
