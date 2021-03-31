<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KorlantasRekap extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function rencaraOperasi()
    {
        return $this->belongsTo(RencanaOperasi::class);
    }

    public function poldaData()
    {
        return $this->belongsTo(Polda::class, "polda", "id");
    }

    public function poldaFilter()
    {
        return $this->polda()->where('name', '!=', 'polda_all');
    }
}
