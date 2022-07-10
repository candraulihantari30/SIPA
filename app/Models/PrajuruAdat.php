<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class PrajuruAdat extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = "id";
    protected $fillable = [
        'nik', 'level', 'nama_pegawai', 'jk', 'jabatan', 'banjar_adat', 'tempekan_id', 'tempat', 'tangal_lahir', 'foto', 'password'
    ];

    protected $hidden = [
        'password',
    ];

    public function transaksi()
    {
        return $this->hasMany(transaksi::class);
    }

    public function jenisKelamin()
    {
        return $this->belongsTo(JenisKelamin::class, 'jk');
    }

    public function banjarAdat()
    {
        return $this->belongsTo(BanjarAdat::class, 'banjar_adat');
    }

    public function tempekan()
    {
        return $this->belongsTo(Tempekan::class, 'tempekan_id');
    }

    public function jabatanPrajuru()
    {
        return $this->belongsTo(JabatanPrajuru::class, 'jabatan');
    }
}
