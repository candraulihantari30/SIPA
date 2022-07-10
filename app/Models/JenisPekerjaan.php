<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPekerjaan extends Model
{
    use HasFactory;
    protected $primaryKey = "id_pekerjaan";
    protected $table = 'jenis_pekerjaans';

    public function krama()
    {
        return $this->hasMany(Krama::class);
    }
}
