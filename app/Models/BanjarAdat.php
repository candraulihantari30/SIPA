<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BanjarAdat extends Model
{
    use HasFactory;

    protected $table = 'banjar_adats';
    protected $primaryKey = 'id_banjar_adat';
    protected $fillable = ['id_banjar_adat', 'nama_banjar_adat'];

    public function krama()
    {
        return $this->hasMany(Krama::class);
    }

    public function Dadya()
    {
        return $this->hasMany(Dadya::class);
    }

    public function prajuru()
    {
        return $this->hasOne(PrajuruAdat::class);
    }

    public function dataTempekan()
    {
        return $this->hasMany(Tempekan::class);
    }
}
