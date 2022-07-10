<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPendidikan extends Model
{
    use HasFactory;
    protected $primaryKey = "id_pendidikan";
    protected $table = 'jenis_pendidikans';

    public function krama()
    {
        return $this->hasMany(Krama::class);
    }
}
