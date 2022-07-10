<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekapAbsen extends Model
{
    use HasFactory;
    protected $table = 'rekap_absens';
    protected $primaryKey = 'id_rekap';
    protected $fillable = [
        'krama_id', 'hadir', 'izin', 'tidak_hadir', 'nominal', 'jenis'
    ];
}
