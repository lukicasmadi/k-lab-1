<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyNotice extends Model
{
    use HasFactory;

    protected $table = 'daily_prev_notices';

    public function scopeSummary($query, $operation_id, $sumParam)
    {
        return number_format($query->where('operation_id', $operation_id)->sum($sumParam), 0, ".", ".");
    }
}
