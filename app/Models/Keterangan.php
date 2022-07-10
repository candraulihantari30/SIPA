<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keterangan extends Model
{
    use HasFactory;
    protected $primaryKey = "id_keterangan";
    protected $table = 'keterangans';

    public function krama()
    {
        return $this->hasMany(Krama::class);
    }
}
