<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tempekan extends Model
{
    use HasFactory;

    protected $table = 'tempekans';
    protected $primaryKey = 'id_tempekan';

    public function krama()
    {
        return $this->HasMany(Krama::class);
    }

    public function prajuru()
    {
        return $this->hasMany(PrajuruAdat::class);
    }

    public function banjarAdat()
    {
        return $this->belongsTo(BanjarAdat::class, 'banjar_adat_id');
    }
}
