<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $table = 'statuses';
    protected $primaryKey = "id";
    protected $fillable = [
        'status_krama', 'urunan', 'jenis'
    ];

    public function krama()
    {
        return $this->hasMany(Krama::class);
    }

    public function urunan()
    {
        return $this->hasMany(Irnw::class);
    }
}
