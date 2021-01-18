<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, LogsActivity;

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
