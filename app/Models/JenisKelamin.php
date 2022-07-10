<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKelamin extends Model
{
    use HasFactory;

    protected $table = 'jenis_kelamins';

    public function krama()
    {
        return $this->hasMany(Krama::class);
    }

    public function prajuru()
    {
        return $this->hasMany(PrajuruAdat::class);
    }
}
