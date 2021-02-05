<?php

namespace App\Http\Controllers;

use App\Models\Polda;
use Illuminate\Support\Str;
use App\Models\UserHasPolda;
use Illuminate\Http\Request;
use App\Models\PoldaSubmited;
use App\Http\Requests\PHRORequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\PoldaHasRencanaOperasi;
use Illuminate\Support\Facades\Storage;

class PoldaHasRencanaOperasiController extends Controller
{

    public function data()
    {
        $model = PoldaSubmited::perpolda()->with('polda');

        return datatables()->eloquent($model)
        ->addColumn('polda_name', function (PoldaSubmited $ps) {
            return $ps->polda->name;
        })->toJson();
    }

    public function index()
    {
        if(authUser()->hasRole('access_daerah') || authUser()->hasRole('administrator')) {
            return view('phro.index_polda');
        } else {
            return view('phro.index');
        }
    }

    public function create()
    {
        $op = operationPlans();

        if(empty($op)) {
            flash('There are currently no operations in progress')->error();
            return redirect()->route('phro_index');
        }

        $poldaId = UserHasPolda::where("user_id", myUserId())->first()->polda_id;

        $todayInsert = PoldaSubmited::where("polda_id", $poldaId)->where("submited_date", date("Y-m-d"))->first();

        if(!empty($todayInsert)) {
            flash('Polda sudah menginput data hari ini!')->error();
            return redirect()->route('phro_index');
        }

        return view('phro.create', compact('op'));
    }

    public function store(PHRORequest $request)
    {
        $payload = [];

        $poldaId = UserHasPolda::where("user_id", myUserId())->first()->polda_id;

        $uuid = genUuid();

        foreach($request->all() as $key => $val) {
            if($key == "_token" || $key == "submit") {
                continue;
            } else {
                array_push($payload, [
                    'uuid' => $uuid,
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

        if(count($payload) == 255) {
            DB::beginTransaction();

            try {
                PoldaHasRencanaOperasi::insert($payload);

                PoldaSubmited::create([
                    'uuid' => $uuid,
                    'polda_id' => poldaId(),
                    'status' => "SUDAH MENGIRIM LAPORAN",
                    'submited_date' => date("Y-m-d")
                ]);

                DB::commit();
                flash('Seluruh data berhasil dikirim ke pusat')->success();

                return redirect()->route('phro_index');
            } catch (\Exception $e) {
                DB::rollback();
                flash('Data gagal dikirim. Silahkan dicoba kembali atau hubungi admin jika masih gagal')->error();
                return redirect()->back();
            }
        } else {
            flash('Data yang anda proses tidak lengkap')->error();
            return redirect()->back();
        }


    }

    public function download($filePath)
    {
        //
    }

    public function preview($uuid)
    {
        //
    }
}
