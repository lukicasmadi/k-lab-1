<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Alexmg86\LaravelSubQuery\Traits\LaravelSubQueryTrait;

class CountDown extends Model
{
    use HasFactory, LaravelSubQueryTrait;

    protected $guarded = ['id'];

    public function rencanaOperasi()
    {
        return $this->belongsTo(RencanaOperasi::class);
    }

    public function dailyInputCurrent()
    {
        return $this->hasMany(DailyInput::class, 'rencana_operasi_id', 'rencana_operasi_id');
    }

    public function dailyInputPrev()
    {
        return $this->hasMany(DailyInputPrev::class, 'rencana_operasi_id', 'rencana_operasi_id');
    }

    public function prev()
    {
        return $this->hasMany(DailyInputPrev::class, 'rencana_operasi_id', 'rencana_operasi_id');
    }
}
