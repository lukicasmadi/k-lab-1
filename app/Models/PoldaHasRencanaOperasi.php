<?php

namespace App\Models;

use App\Models\Polda;
use App\Models\RencanaOperasi;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class PoldaHasRencanaOperasi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function polda()
    {
        return $this->belongsTo(Polda::class);
    }

    public function rencanaOperasi()
    {
        return $this->belongsTo(RencanaOperasi::class);
    }

    public function scopePerpolda($query)
    {
        return $query->when(isPolda(), function ($q) {
            return $q->where('polda_id', poldaId());
        });
    }
}
