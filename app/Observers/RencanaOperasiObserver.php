<?php

namespace App\Observers;

use Illuminate\Support\Str;
use App\Models\Notification;
use App\Models\RencanaOperasi;

class RencanaOperasiObserver
{

    public function creating(RencanaOperasi $rencanaOperasi)
    {
        $rencanaOperasi->uuid = genUuid();
        $rencanaOperasi->slug_name = Str::slug($rencanaOperasi->name, '-');
        $rencanaOperasi->created_by = myUserId();
        $rencanaOperasi->updated_by = myUserId();
    }

    public function created(RencanaOperasi $rencanaOperasi)
    {
        Notification::create([
            'uuid' => genUuid(),
            'source' => myName(),
            'status' => 'Menginput Rencana '.$rencanaOperasi->name
        ]);
    }

    public function updating(RencanaOperasi $rencanaOperasi)
    {
        $rencanaOperasi->slug_name = Str::slug($rencanaOperasi->name, '-');
        $rencanaOperasi->updated_by = myUserId();
    }

    public function updated(RencanaOperasi $rencanaOperasi)
    {
        Notification::create([
            'uuid' => genUuid(),
            'source' => myName(),
            'status' => 'Mengupdate Rencana '.$rencanaOperasi->name
        ]);
    }

    public function deleted(RencanaOperasi $rencanaOperasi)
    {
        Notification::create([
            'uuid' => genUuid(),
            'source' => myName(),
            'status' => 'Menghapus Data'
        ]);
    }

    public function restored(RencanaOperasi $rencanaOperasi)
    {
        //
    }

    public function forceDeleted(RencanaOperasi $rencanaOperasi)
    {
        Notification::create([
            'uuid' => genUuid(),
            'source' => myName(),
            'status' => 'Menghapus Data'
        ]);
    }
}
