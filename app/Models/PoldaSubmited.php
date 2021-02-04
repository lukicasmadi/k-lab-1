<?php

namespace App\Models;

use App\Models\Polda;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PoldaSubmited extends Model
{
    use HasFactory, LogsActivity;

    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    protected $casts = [
        'submited_date' => 'date:d-m-Y',
    ];

    public function scopePerpolda($query)
    {
        return $query->when(isPolda(), function ($q) {
            return $q->where('polda_id', poldaId());
        });
    }

    public function polda()
    {
        return $this->belongsTo(Polda::class);
    }
}
