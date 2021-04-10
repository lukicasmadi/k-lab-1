<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperationExtractDate extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['rencana_operasi_id', 'extract_date'];

    public function rencanaOperasi()
    {
        return $this->belongsTo(RencanaOperasi::class);
    }
}
