<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyRekap extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function rencanaOperasi()
    {
        return $this->belongsTo(RencanaOperasi::class, 'rencana_operasi_id', 'id');
    }
}
