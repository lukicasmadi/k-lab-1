<?php

namespace App\Models;

use App\Models\PoldaHasRencanaOperasi;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Polda extends Model
{
    use HasFactory, LogsActivity;

    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function rencanaOperation()
    {
        return $this->hasMany(PoldaHasRencanaOperasi::class);
    }

    public function operation()
    {
        return $this->belongsTo(RencanaOperasi::class);
    }
}
