<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SumLoopEveryday extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeGroup($query, $groupName, $yearFlag)
    {
        return $query->where('group_name', $groupName)->where('year_flag', $yearFlag)->orderBy('id', 'asc');
    }

    public function scopeSummary($query, $groupName, $yearFlag)
    {
        return $query->where('group_name', $groupName)->where('year_flag', $yearFlag)->sum('summary');
    }
}
