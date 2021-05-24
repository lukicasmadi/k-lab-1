<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\CountDown;
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
    public function byId($id)
    {
        $data = RencanaOperasi::where("id", $id)->first();

        if(empty($data)) {
            abort(404);
        }

        return $data;
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
        if(isAdmin()) {
            return view('operation.admin_index');
        }

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

        $count = 1;

        foreach($extractDate as $key => $item) {
            OperationExtractDate::create([
                'rencana_operasi_id' => $create->id,
                'extract_date' => $item
            ]);

            if($count >= 1 && $count <= 7) {
                $week = 1;
            } else if($count > 7 && $count <= 14) {
                $week = 2;
            } else if($count > 14 && $count <= 21) {
                $week = 3;
            } else if($count > 21 && $count <= 28) {
                $week = 4;
            } else if($count > 28 && $count <= 35) {
                $week = 5;
            } else if($count > 35 && $count <= 42) {
                $week = 6;
            } else if($count > 42 && $count <= 49) {
                $week = 7;
            } else if($count > 49 && $count <= 56) {
                $week = 8;
            } else if($count > 56 && $count <= 63) {
                $week = 9;
            } else if($count > 63 && $count <= 70) {
                $week = 10;
            }

            CountDown::create([
                'rencana_operasi_id' => $create->id,
                'tanggal' => $item,
                'deskripsi' => $request->nama_operasi." Hari Ke-".$count,
                'week' => $week,
            ]);

            $count++;
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
        $findRO = RencanaOperasi::whereUuid($request->uuid_edit)->first();

        $data = [
            'name' => strtoupper($request->edit_jenis_operasi),
            'operation_type' => strtoupper($request->edit_nama_operasi),
            'start_date' => dateOnly($request->edit_tanggal_mulai),
            'end_date' => dateOnly($request->edit_tanggal_selesai),
        ];

        RencanaOperasi::whereUuid($request->uuid_edit)->update($data);

        OperationExtractDate::where('rencana_operasi_id', $findRO->id)->delete();
        CountDown::where('rencana_operasi_id', $findRO->id)->delete();

        $extractDate = extractDateRange(dateOnly($request->edit_tanggal_mulai), dateOnly($request->edit_tanggal_selesai));

        $count = 1;

        foreach($extractDate as $key => $item) {
            OperationExtractDate::create([
                'rencana_operasi_id' => $findRO->id,
                'extract_date' => $item
            ]);

            if($count >= 1 && $count <= 7) {
                $week = 1;
            } else if($count > 7 && $count <= 14) {
                $week = 2;
            } else if($count > 14 && $count <= 21) {
                $week = 3;
            } else if($count > 21 && $count <= 28) {
                $week = 4;
            } else if($count > 28 && $count <= 35) {
                $week = 5;
            } else if($count > 35 && $count <= 42) {
                $week = 6;
            } else if($count > 42 && $count <= 49) {
                $week = 7;
            } else if($count > 49 && $count <= 56) {
                $week = 8;
            } else if($count > 56 && $count <= 63) {
                $week = 9;
            } else if($count > 63 && $count <= 70) {
                $week = 10;
            }

            CountDown::create([
                'rencana_operasi_id' => $findRO->id,
                'tanggal' => $item,
                'deskripsi' => $request->edit_nama_operasi." Hari Ke-".$count,
                'week' => $week,
            ]);

            $count++;
        }

        flash('Rencana operasi telah diubah')->success();
        return redirect()->route('rencana_operasi_index');
    }

    public function destroy($uuid)
    {
        $data = RencanaOperasi::whereUuid($uuid)->firstOrFail();

        $data->delete();

        return response()->json([
            'output' => 'Rencana operasi telah dihapus!',
        ], 200);
    }
}
