<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dadya extends Model
{
    use HasFactory;
    protected $table = 'dadyas';
    protected $primaryKey = "id_ddy";
    protected $fillable = [
        'nm_kt', 'nm_ddy', 'alamat'
    ];

    public function banjarAdat()
    {
        return $this->belongsTo(BanjarAdat::class, 'alamat');
    }

    public function ddys()
    {
        return $this->belongsTo(Nmddy::class, 'nm_ddy');
    }
}
