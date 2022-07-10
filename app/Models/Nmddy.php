<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nmddy extends Model
{
    use HasFactory;

    protected $table = 'nmddies';
    protected $primaryKey = 'id_ddys';

    public function Dadya()
    {
        return $this->hasMany(Dadya::class);
    }

    public function Krama()
    {
        return $this->hasMany(Krama::class);
    }
}
