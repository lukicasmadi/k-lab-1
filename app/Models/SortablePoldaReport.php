<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Alexmg86\LaravelSubQuery\Traits\LaravelSubQueryTrait;

class SortablePoldaReport extends Model
{
    use HasFactory, LaravelSubQueryTrait;

    protected $guarded = ['id'];

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

    public function current()
    {
        return $this->hasMany(DailyInput::class, 'polda_id', 'polda_id');
    }

    public function prev()
    {
        return $this->hasMany(DailyInputPrev::class, 'polda_id', 'polda_id');
    }
}
