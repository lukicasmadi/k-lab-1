<?php

namespace App\Observers;

use App\Models\Polda;

class PoldaObserver
{
    /**
     * Handle the Polda "created" event.
     *
     * @param  \App\Models\Polda  $polda
     * @return void
     */
    public function creating(Polda $polda)
    {
        $polda->uuid = genUuid();
        $polda->created_by = myUserId();
        $polda->updated_by = myUserId();
    }

    /**
     * Handle the Polda "updated" event.
     *
     * @param  \App\Models\Polda  $polda
     * @return void
     */
    public function updating(Polda $polda)
    {
        $polda->updated_by = myUserId();
    }

    /**
     * Handle the Polda "deleted" event.
     *
     * @param  \App\Models\Polda  $polda
     * @return void
     */
    public function deleted(Polda $polda)
    {
        //
    }

    /**
     * Handle the Polda "restored" event.
     *
     * @param  \App\Models\Polda  $polda
     * @return void
     */
    public function restored(Polda $polda)
    {
        //
    }

    /**
     * Handle the Polda "force deleted" event.
     *
     * @param  \App\Models\Polda  $polda
     * @return void
     */
    public function forceDeleted(Polda $polda)
    {
        //
    }
}
