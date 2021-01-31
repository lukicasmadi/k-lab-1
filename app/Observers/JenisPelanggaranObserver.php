<?php

namespace App\Observers;

use App\Models\JenisPelanggaran;

class JenisPelanggaranObserver
{
    /**
     * Handle the JenisPelanggaran "created" event.
     *
     * @param  \App\Models\JenisPelanggaran  $jenisPelanggaran
     * @return void
     */
    public function creating(JenisPelanggaran $jenisPelanggaran)
    {
        $jenisPelanggaran->uuid = genUuid();
        $jenisPelanggaran->created_by = myUserId();
        $jenisPelanggaran->updated_by = myUserId();
    }

    public function created(JenisPelanggaran $jenisPelanggaran)
    {
        //
    }

    public function updating(JenisPelanggaran $jenisPelanggaran)
    {
        $jenisPelanggaran->updated_by = myUserId();
    }

    /**
     * Handle the JenisPelanggaran "updated" event.
     *
     * @param  \App\Models\JenisPelanggaran  $jenisPelanggaran
     * @return void
     */
    public function updated(JenisPelanggaran $jenisPelanggaran)
    {
        //
    }

    /**
     * Handle the JenisPelanggaran "deleted" event.
     *
     * @param  \App\Models\JenisPelanggaran  $jenisPelanggaran
     * @return void
     */
    public function deleted(JenisPelanggaran $jenisPelanggaran)
    {
        //
    }

    /**
     * Handle the JenisPelanggaran "restored" event.
     *
     * @param  \App\Models\JenisPelanggaran  $jenisPelanggaran
     * @return void
     */
    public function restored(JenisPelanggaran $jenisPelanggaran)
    {
        //
    }

    /**
     * Handle the JenisPelanggaran "force deleted" event.
     *
     * @param  \App\Models\JenisPelanggaran  $jenisPelanggaran
     * @return void
     */
    public function forceDeleted(JenisPelanggaran $jenisPelanggaran)
    {
        //
    }
}
