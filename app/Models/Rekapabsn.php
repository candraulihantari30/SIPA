<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekapabsn extends Model
{
    use HasFactory;
    protected $table = 'rekapabsns';
    protected $fillable = [
        'nik', 'nama', 'jmlh_h', 'jmlh_th',
        'hari', 'tgl', 'bln', 'thn'
    ];
}
