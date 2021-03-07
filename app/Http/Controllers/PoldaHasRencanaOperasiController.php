<?php

namespace App\Http\Controllers;

use App\Models\Polda;
use App\Models\DailyInput;
use Illuminate\Support\Str;
use App\Models\UserHasPolda;
use Illuminate\Http\Request;
use App\Models\PoldaSubmited;
use App\Http\Requests\PHRORequest;
use Illuminate\Support\Facades\DB;
use App\Exports\PoldaSubmitedExport;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class PoldaHasRencanaOperasiController extends Controller
{

    public function data()
    {
        $model = PoldaSubmited::perpolda()->with('polda');

        $model->when(authUser()->hasRole('access_daerah'), function ($q) {
            return $q->where(DB::raw('DATE(created_at)'), now()->format("Y-m-d"));
        });

        return datatables()->eloquent($model)
        ->addColumn('polda_name', function (PoldaSubmited $ps) {
            return $ps->polda->name;
        })->toJson();
    }

    public function index()
    {
        return view('phro.index_polda');
    }

    public function create()
    {
        $op = operationPlans();

        if(empty($op)) {
            flash('Tidak ada operasi yang sedang berjalan')->error();
            return redirect()->route('phro_index');
        }

        $poldaId = UserHasPolda::where("user_id", myUserId())->first()->polda_id;

        $todayInsert = PoldaSubmited::where("polda_id", $poldaId)->where("submited_date", date("Y-m-d"))->first();

        if(!empty($todayInsert)) {
            flash('Maaf, anda sudah menginput laporan hari ini! Silahkan gunakan menu edit')->error();
            return redirect()->route('phro_index');
        }

        return view('phro.create', compact('op'));
    }

    public function store(PHRORequest $request)
    {
        DB::beginTransaction();

        try {

            $poldaSubmit = PoldaSubmited::create([
                'uuid' => genUuid(),
                'polda_id' => poldaId(),
                'rencana_operasi_id' => operationPlans()->id,
                'status' => "SUDAH MENGIRIMKAN LAPORAN",
                'submited_date' => date("Y-m-d")
            ]);

            $payload = $request->except(['_token', 'submit']);
            $payload["polda_submited_id"] = $poldaSubmit->id;
            $payload["rencana_operasi_id"] = operationPlans()->id;

            DailyInput::create($payload);

            DB::commit();
            flash('Seluruh data berhasil dikirim ke pusat')->success();

            return redirect()->route('phro_index');
        } catch (\Exception $e) {
            DB::rollback();
            logger($e);
            flash('Data gagal dikirim. Silahkan dicoba kembali atau hubungi admin jika masih gagal')->error();
            return redirect()->back();
        }
    }

    public function edit($uuid)
    {
        $data = PoldaSubmited::with('dailyInput')->whereUuid($uuid)->firstOrFail();

        return view('phro.edit', compact('data', 'uuid'));
    }

    public function update(PHRORequest $request, $uuid)
    {
        DB::beginTransaction();

        try {

            $payload = $request->except(['_token', 'submit', '_method']);

            $poldaSubmited = PoldaSubmited::whereUuid($uuid)->firstOrFail();

            DailyInput::where("polda_submited_id", $poldaSubmited->id)
                ->where(DB::raw('DATE(created_at)'), $poldaSubmited->submited_date)
                ->update($payload);

            DB::commit();
            flash('Seluruh data berhasil diupdate')->success();

            return redirect()->route('phro_index');
        } catch (\Exception $e) {
            DB::rollback();
            logger($e);
            flash('Data gagal diupdate. Silahkan dicoba kembali atau hubungi admin jika masih gagal')->error();
            return redirect()->back();
        }
    }

    public function preview($uuid)
    {
        $data = PoldaSubmited::with('dailyInput')->whereUuid($uuid)->firstOrFail();
        return view('phro.preview_load', compact('data'));
    }

    public function previewPhroDashboard($uuid)
    {
        $polda = Polda::whereUuid($uuid)->firstOrFail();
        $data = PoldaSubmited::with('dailyInput')->where("polda_id", $polda->id)->firstOrFail();
        return view('phro.preview_load', compact('data'));
    }

    public function download($uuid)
    {
        $polda = Polda::whereUuid($uuid)->firstOrFail();
        $now = now()->format("Y-m-d");
        $filename = 'daily-report-'.$polda->short_name.'-'.$now.'.xlsx';
        return Excel::download(new PoldaSubmitedExport($uuid), $filename);
    }
}
