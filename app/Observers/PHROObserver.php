<?php

namespace App\Observers;

use Illuminate\Support\Str;
use App\Models\UserHasPolda;
use App\Models\PoldaHasRencanaOperasi;

class PHROObserver
{

    public function creating(PoldaHasRencanaOperasi $phro)
    {
        $phro->uuid = genUuid();
        $phro->rencana_operasi_id = operationPlans()->id;
        $phro->polda_id = UserHasPolda::where("user_id", myUserId())->first()->polda_id;
        $phro->slug_operation_name = Str::slug($phro->operation_name, '-');
        $phro->created_by = myUserId();
        $phro->updated_by = myUserId();
    }

    public function created(PoldaHasRencanaOperasi $phro)
    {
        //
    }


    public function updated(PoldaHasRencanaOperasi $phro)
    {
        $phro->slug_operation_name = Str::slug($phro->operation_name, '-');
        $phro->updated_by = myUserId();
    }


    public function deleted(PoldaHasRencanaOperasi $phro)
    {
        //
    }


    public function restored(PoldaHasRencanaOperasi $poldaHasRencanaOperasi)
    {
        //
    }


    public function forceDeleted(PoldaHasRencanaOperasi $poldaHasRencanaOperasi)
    {
        //
    }
}
