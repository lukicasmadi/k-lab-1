<?php

namespace App\Observers;

use App\Models\Notification;
use App\Models\PoldaHasRencanaOperasi;

class PoldaHasRencanaOperasiObserver
{

    public function creating(PoldaHasRencanaOperasi $poldaHasRencanaOperasi)
    {
        //
    }

    public function created(PoldaHasRencanaOperasi $poldaHasRencanaOperasi)
    {
        Notification::create([
            'uuid' => genUuid(),
            'source' => myName(),
            'status' => myName().' Sudah Mengirim'
        ]);
    }

    public function updated(PoldaHasRencanaOperasi $poldaHasRencanaOperasi)
    {
        Notification::create([
            'uuid' => genUuid(),
            'source' => myName(),
            'status' => myName().' Mengupdate Data'
        ]);
    }

    public function deleted(PoldaHasRencanaOperasi $poldaHasRencanaOperasi)
    {
        Notification::create([
            'uuid' => genUuid(),
            'source' => myName(),
            'status' => myName().' Menghapus Data'
        ]);
    }

    public function restored(PoldaHasRencanaOperasi $poldaHasRencanaOperasi)
    {
        //
    }

    public function forceDeleted(PoldaHasRencanaOperasi $poldaHasRencanaOperasi)
    {
        Notification::create([
            'uuid' => genUuid(),
            'source' => myName(),
            'status' => myName().' Menghapus Data'
        ]);
    }
}
