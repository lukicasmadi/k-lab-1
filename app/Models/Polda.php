<?php

namespace App\Models;

use App\Models\PoldaSubmited;
use App\Models\PoldaHasRencanaOperasi;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Polda extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function rencanaOperation()
    {
        return $this->hasMany(PoldaHasRencanaOperasi::class, "polda_id", "id");
    }

    public function operation()
    {
        return $this->belongsTo(RencanaOperasi::class);
    }

    public function dailyInput()
    {
        return $this->hasOne(PoldaSubmited::class);
    }

    public function poldaInputCurrentToday()
    {
        return $this->hasOne(DailyInput::class, 'polda_id', 'id')->whereRaw("DATE(created_at) >= ?", [nowToday()]);
    }

    public function poldaInputPrevToday()
    {
        return $this->hasOne(DailyInputPrev::class, 'polda_id', 'id')->whereRaw("DATE(created_at) >= ?", [nowToday()]);
    }
}
