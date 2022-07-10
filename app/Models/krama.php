<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Krama extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $primaryKey = "id";
    protected $fillable = [
        'nik', 'level', 'no_kk', 'nm', 'tmpt', 'tgl', 'stts_dlm_klrg', 'jbt',
        'bnjr_adt', 'tmpkn', 'stts', 'pndd', 'pkrjn', 'jk',
        'ktrgn', 'ft', 'nm_ddy', 'nm_kt_ddy', 'password',
    ];

    protected $hidden = [
        'password',
    ];

    // Relasi untuk mengambil data krama

    // public function urunan()
    // {
    //     return $this->hasMany(Irnw::class, 'nik');
    // }

    public function presensi()
    {
        return $this->hasMany(Presensi::class);
    }

    public function transaksi()
    {
        return $this->hasMany(transaksi::class);
    }

    // Relasi Untuk data di tabel krama

    public function jenisKelamin()
    {
        return $this->belongsTo(JenisKelamin::class, 'jk');
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jbt');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'stts');
    }

    public function statusKeluarga()
    {
        return $this->belongsTo(StatusKeluarga::class, 'stts_dlm_klrg');
    }

    public function banjarAdat()
    {
        return $this->belongsTo(BanjarAdat::class, 'bnjr_adt');
    }

    public function tempekan()
    {
        return $this->belongsTo(Tempekan::class, 'tmpkn');
    }

    public function jenispendidikan()
    {
        return $this->belongsTo(JenisPendidikan::class, 'pndd');
    }

    public function jenispekerjaan()
    {
        return $this->belongsTo(JenisPekerjaan::class, 'pkrjn');
    }

    public function keterangan()
    {
        return $this->belongsTo(Keterangan::class, 'ktrgn');
    }

    public function nmddy()
    {
        return $this->belongsTo(Nmddy::class, 'nm_ddy');
    }

    public function ketuaDadya()
    {
        return $this->belongsTo(Dadya::class, 'nm_kt_ddy');
    }
}
