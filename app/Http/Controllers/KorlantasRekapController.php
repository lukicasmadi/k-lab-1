<?php

namespace App\Http\Controllers;

use App\Models\DailyInput;
use Illuminate\Http\Request;
use App\Models\DailyInputPrev;
use App\Models\KorlantasRekap;
use App\Models\RencanaOperasi;
use Illuminate\Support\Facades\DB;
use App\Models\PoldaCustomOperationName;
use App\Http\Requests\KorlantasRekapRequest;

class KorlantasRekapController extends Controller
{

    public function korlantas_rekap($uuid)
    {
        $model = KorlantasRekap::whereUuid($uuid)->first();

        if(empty($model)) {
            abort(404);
        }

        return $model;
    }

    public function polda_custom_name()
    {
        return view('operation.polda_custom');
    }

    public function getCustomName($uuid)
    {
        $rencana_operasi = RencanaOperasi::whereUuid($uuid)->first();

        if(!empty($rencana_operasi)) {
            $rencanaOpId = $rencana_operasi->id;
            $pCustomName = PoldaCustomOperationName::where('rencana_operasi_id', $rencanaOpId)->where('polda_id', poldaId())->first();

            if(empty($pCustomName)) {
                return [
                    'rencana_op_id' => $rencanaOpId,
                    'output' => null
                ];
            } else {
                return [
                    'rencana_op_id' => $rencanaOpId,
                    'output' => $pCustomName->alias
                ];
            }
        } else {
            abort(404);
        }
    }

    public function storeCustomName()
    {
        $pcon = PoldaCustomOperationName::updateOrCreate(
            ['rencana_operasi_id' => request('operation_id'), 'polda_id' => poldaId()],
            ['alias' => strtoupper(request('alias'))]
        );

        return $pcon;
    }
}
