<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoopTotalSummary extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public $timestamps = false;

    public function scopeSummary($query, $type)
    {
        return $query->where('type', $type)->sum('val');
    }
}
