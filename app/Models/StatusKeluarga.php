<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusKeluarga extends Model
{
    use HasFactory;

    protected $table = 'status_keluargas';

    public function krama()
    {
        return $this->hasMany(Krama::class);
    }
}
