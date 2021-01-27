<?php

namespace App\Models;

use App\Models\PoldaHasRencanaOperasi;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RencanaOperasi extends Model
{
    use HasFactory, LogsActivity;

    protected $guarded = ['id'];

    protected $casts = [
        'start_date'  => 'date:d-m-Y',
        'end_date' => 'date:d-m-Y',
    ];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function poldaInputRencanaOperasi()
    {
        return $this->hasMany(PoldaHasRencanaOperasi::class);
    }
}
