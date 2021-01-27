<?php

namespace App\Observers;

use Illuminate\Support\Str;
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
        //
    }

    public function updating(RencanaOperasi $rencanaOperasi)
    {
        $rencanaOperasi->slug_name = Str::slug($rencanaOperasi->name, '-');
        $rencanaOperasi->updated_by = myUserId();
    }

    public function updated(RencanaOperasi $rencanaOperasi)
    {
        //
    }

    /**
     * Handle the RencanaOperasi "deleted" event.
     *
     * @param  \App\Models\RencanaOperasi  $rencanaOperasi
     * @return void
     */
    public function deleted(RencanaOperasi $rencanaOperasi)
    {
        //
    }

    /**
     * Handle the RencanaOperasi "restored" event.
     *
     * @param  \App\Models\RencanaOperasi  $rencanaOperasi
     * @return void
     */
    public function restored(RencanaOperasi $rencanaOperasi)
    {
        //
    }

    /**
     * Handle the RencanaOperasi "force deleted" event.
     *
     * @param  \App\Models\RencanaOperasi  $rencanaOperasi
     * @return void
     */
    public function forceDeleted(RencanaOperasi $rencanaOperasi)
    {
        //
    }
}
