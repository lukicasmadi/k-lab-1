<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\RencanaOperasi;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Models\PoldaCustomOperationName;
use App\Http\Requests\RencanaOperasiRequest;
use App\Http\Requests\RencanaOperasiUpdateRequest;

class RencanaOperasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('can-create-plan')->only('create', 'store', 'edit', 'update', 'rencana_operasi_custom_name', 'rencana_operasi_by_uuid');
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
            'start_date' => strtoupper(request('tanggal_mulai')),
            'end_date' => strtoupper(request('tanggal_selesai')),
            'desc' => strtoupper(request('deskripsi')),
        ];

        if(request()->hasFile('attachement')) {
            $file = $request->file('attachement');
            $randomName = Str::random(20) . '.' . $file->getClientOriginalExtension();
            Storage::put("/public/upload/rencana_operasi/".$randomName, File::get($file));
            $data['attachement'] = $randomName;
        }

        RencanaOperasi::create($data);

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
        // $all_date = $request->operation_periode;
        // $format = explode(" to ", $all_date);

        // $start_date = Carbon::parse(rtrim($format[0], " "))->format('Y-m-d');
        // $end_date = Carbon::parse(ltrim($format[1], " "))->format('Y-m-d');

        $data = [
            'name' => strtoupper($request->edit_jenis_operasi),
            'operation_type' => strtoupper($request->edit_nama_operasi),
            'start_date' => $request->edit_tanggal_mulai,
            'end_date' => $request->edit_tanggal_selesai,
            'desc' => $request->edit_deskripsi,
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
