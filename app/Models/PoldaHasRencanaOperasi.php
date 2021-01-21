<?php

namespace App\Models;

use App\Models\Polda;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PoldaHasRencanaOperasi extends Model
{
    use HasFactory, LogsActivity;

    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function polda()
    {
        return $this->belongsTo(Polda::class);
    }
}
