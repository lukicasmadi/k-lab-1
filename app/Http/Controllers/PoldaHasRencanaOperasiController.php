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

    public function store(Request $request)
    {
        // $data = [
        //     'pelanggaran_lalu_lintas' => request('pelanggaran_lalu_lintas'),
        //     'jenis_pelanggaran_lalu_lintas' => request('jenis_pelanggaran_lalu_lintas'),
        //     'barang_bukti_yang_disita' => request('barang_bukti_yang_disita'),
        // ];

        // PoldaHasRencanaOperasi::create($data);

        // flash('Your data has been saved')->success();
        // return redirect()->route('phro_index');

        return $request->all();
    }

    public function download($filePath)
    {
        PoldaHasRencanaOperasi::where("attachement", $filePath)->firstOrFail();
        return response()->download(storage_path("app/public/upload/phro/{$filePath}"));
    }
}
