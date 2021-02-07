<?php

namespace App\Models;

use App\Models\User;
use App\Models\Polda;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserHasPolda extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function polda()
    {
        return $this->belongsTo(Polda::class);
    }
}
