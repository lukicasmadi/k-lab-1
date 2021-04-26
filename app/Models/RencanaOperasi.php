<?php

namespace App\Models;

use App\Models\PoldaHasRencanaOperasi;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class RencanaOperasi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // protected $casts = [
    //     'start_date'  => 'date:d-m-Y',
    //     'end_date' => 'date:d-m-Y',
    // ];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function poldaHasOperationNameAlias()
    {
        return $this->hasMany(PoldaCustomOperationName::class);
    }

    public function poldaAlias()
    {
        return $this->hasMany(PoldaCustomOperationName::class);
    }

    public function dailyInputCurrent()
    {
        return $this->hasMany(DailyInput::class, 'rencana_operasi_id', 'id');
    }

    public function dailyInputPrev()
    {
        return $this->hasMany(DailyInputPrev::class, 'rencana_operasi_id', 'id');
    }

    public function operationEkstrakDate()
    {
        return $this->hasMany(OperationExtractDate::class, 'rencana_operasi_id', 'id');
    }

    public function poldaSubmited()
    {
        return $this->hasMany(PoldaSubmited::class, 'rencana_operasi_id', 'id');
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($rencanaOperasi) {
             $rencanaOperasi->dailyInputCurrent()->delete();
             $rencanaOperasi->dailyInputPrev()->delete();
             $rencanaOperasi->operationEkstrakDate()->delete();
             $rencanaOperasi->poldaAlias()->delete();
             $rencanaOperasi->poldaSubmited()->delete();
        });
    }
}
