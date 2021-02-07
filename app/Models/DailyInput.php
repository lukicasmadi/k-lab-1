<?php

namespace App\Models;

use App\Models\PoldaSubmited;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class DailyInput extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function poldaSubmited()
    {
        return $this->belongsTo(PoldaSubmited::class);
    }
}
