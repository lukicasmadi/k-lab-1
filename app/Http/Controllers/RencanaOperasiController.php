<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\RencanaOperasi;
use App\Models\OperationExtractDate;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Models\PoldaCustomOperationName;
use App\Http\Requests\RencanaOperasiRequest;
use App\Http\Requests\RencanaOperasiUpdateRequest;

class RencanaOperasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('can-create-plan')->only('create', 'store', 'edit', 'update');
    }

    public function rencana_operasi_custom_name($uuid)
    {
        $data = RencanaOperasi::where("uuid", $uuid)->firstOrFail();
        $pcon = PoldaCustomOperationName::where('rencana_operasi_id', $data->id)->where('polda_id', poldaId())->first();

        return $pcon;
    }

    public function rencana_operasi_by_uuid($uuid)
    {
        $data = RencanaOperasi::where("uuid", $uuid)->firstOrFail();

        return $data;
    }

    public function data()
    {
        $model = RencanaOperasi::query();
        return datatables()->eloquent($model)->toJson();
    }

    public function dataAlias()
    {
        $model = RencanaOperasi::with(['poldaAlias' => function($query) {
            $query->where('polda_id', poldaId());
        }]);

        return datatables()->eloquent($model)
        ->addColumn('alias_name', function (RencanaOperasi $ro) {
            if(empty($ro->poldaAlias) || count($ro->poldaAlias) <= 0) {
                return "-";
            } else {
                return $ro->poldaAlias[0]->alias;
            }
        })
        ->toJson();
    }

    public function index()
    {
        return view('operation.index');
    }

    public function create()
    {
        return view('operation.create');
    }

    public function download($filePath)
    {
        RencanaOperasi::where("attachement", $filePath)->firstOrFail();
        return response()->download(storage_path("app/public/upload/rencana_operasi/{$filePath}"));
    }

    public function store(RencanaOperasiRequest $request)
    {
        $data = [
            'name' => strtoupper(request('nama_operasi')),
            'operation_type' => strtoupper(request('jenis_operasi')),
            'start_date' => dateOnly(request('tanggal_mulai')),
            'end_date' => dateOnly(request('tanggal_selesai')),
        ];

        $firstCheck = OperationExtractDate::with('rencanaOperasi')
        ->where('extract_date', dateOnly(request('tanggal_mulai')))
        ->orWhere('extract_date', dateOnly(request('tanggal_selesai')))
        ->first();

        if(!empty($firstCheck) || !empty($secondCheck)) {
            flash('Tanggal rencana operasi sudah ada didalam range waktu yang anda pilih. Operasi tersebut adalah '.$firstCheck->rencanaOperasi->name)->error();
            return redirect()->route('rencana_operasi_index');
        }

        $create = RencanaOperasi::create($data);

        $extractDate = extractDateRange(dateOnly(request('tanggal_mulai')), dateOnly(request('tanggal_selesai')));

        foreach($extractDate as $item) {
            OperationExtractDate::create([
                'rencana_operasi_id' => $create->id,
                'extract_date' => $item
            ]);
        }

        flash('Rencana operasi telah dibuat')->success();
        return redirect()->route('rencana_operasi_index');
    }

    public function edit($uuid)
    {
        $data = RencanaOperasi::whereUuid($uuid)->firstOrFail();
        return view('operation.edit', compact('data'));
    }

    public function update(RencanaOperasiUpdateRequest $request, $uuid)
    {
        $data = [
            'name' => strtoupper($request->edit_jenis_operasi),
            'operation_type' => strtoupper($request->edit_nama_operasi),
            'start_date' => dateOnly($request->edit_tanggal_mulai),
            'end_date' => dateOnly($request->edit_tanggal_selesai),
        ];

        RencanaOperasi::whereUuid($request->uuid_edit)->update($data);

        flash('Your data has been updated')->success();
        return redirect()->route('rencana_operasi_index');
    }

    public function destroy($uuid)
    {
        $validation = RencanaOperasi::has('poldaInputRencanaOperasi')->whereUuid($uuid)->count();

        if($validation > 0) {
            return response()->json([
                'output' => 'This data is still related to other data',
            ], 403);
        } else {
            $data = RencanaOperasi::whereUuid($uuid)->firstOrFail();

            Storage::delete('/public/upload/rencana_operasi/'.$data->attachement);

            $data->delete();

            return response()->json([
                'output' => 'Your data has been deleted.',
            ], 200);
        }
    }
}
