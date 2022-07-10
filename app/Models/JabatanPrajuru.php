<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JabatanPrajuru extends Model
{
    use HasFactory;

    protected $table = 'jabatan_prajurus';
    protected $primaryKey = 'id';

    public function prajuru()
    {
        return $this->hasMany(PrajuruAdat::class);
    }
}
