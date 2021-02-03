<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\UserHasPolda;
use Illuminate\Http\Request;
use App\Http\Requests\PHRORequest;
use Illuminate\Support\Facades\File;
use App\Models\PoldaHasRencanaOperasi;
use Illuminate\Support\Facades\Storage;

class PoldaHasRencanaOperasiController extends Controller
{

    public function data()
    {
        $model = PoldaHasRencanaOperasi::perpolda()->with('rencanaOperasi');

        return datatables()->eloquent($model)
        ->addColumn('op_name', function (PoldaHasRencanaOperasi $phro) {
            return $phro->rencanaOperasi->name;
        })->toJson();
    }

    public function index()
    {
        return view('phro.index');
    }

    public function create()
    {
        $op = operationPlans();

        if(empty($op)) {
            flash('There are currently no operations in progress')->error();
            return redirect()->route('phro_index');
        }

        $check = UserHasPolda::where("user_id", myUserId())->first();

        if(empty($check)) {
            flash('Your account has not been linked to any Polda data. Please contact the authorized officer')->error();
            return redirect()->route('phro_index');
        }

        return view('phro.create', compact('op'));
    }

    public function store(PHRORequest $request)
    {
        $payload = [];

        $poldaId = UserHasPolda::where("user_id", myUserId())->first()->polda_id;

        foreach($request->all() as $key => $val) {
            if($key == "_token" || $key == "submit") {
                continue;
            } else {
                array_push($payload, [
                    'uuid' => genUuid(),
                    'rencana_operasi_id' => operationPlans()->id,
                    'polda_id' => $poldaId,
                    'type_name' => $key,
                    'type_value' => $val,
                    'created_by' => myUserId(),
                    'updated_by' => myUserId(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        PoldaHasRencanaOperasi::insert($payload);

        flash('Your data has been saved')->success();
        return redirect()->route('phro_create');
    }

    public function download($filePath)
    {
        PoldaHasRencanaOperasi::where("attachement", $filePath)->firstOrFail();
        return response()->download(storage_path("app/public/upload/phro/{$filePath}"));
    }
}
