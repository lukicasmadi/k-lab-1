<?php

namespace App\Models;

use App\Models\PoldaSubmited;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Alexmg86\LaravelSubQuery\Traits\LaravelSubQueryTrait;

class DailyInputPrev extends Model
{
    use HasFactory, LaravelSubQueryTrait;

    protected $guarded = ['id'];
    protected $table = 'daily_input_prev';

    public function poldaSubmited()
    {
        return $this->belongsTo(PoldaSubmited::class);
    }
}
