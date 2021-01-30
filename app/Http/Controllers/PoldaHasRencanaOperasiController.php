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
        $model = PoldaHasRencanaOperasi::with('rencanaOperasi');

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
        $check = UserHasPolda::where("user_id", myUserId())->first();

        if(empty($check)) {
            flash('Your account has not been linked to any Polda data. Please contact the authorized officer')->error();
            return redirect()->route('phro_index');
        }

        return view('phro.create');
    }

    public function store(PHRORequest $request)
    {
        $data = [
            'operation_name' => request('operation_name'),
            'detail_operation' => request('detail_operation'),
            'additional_info' => request('additional_info'),
        ];

        if(request()->hasFile('attachement')) {
            $file = $request->file('attachement');
            $randomName = Str::random(20) . '.' . $file->getClientOriginalExtension();
            Storage::put("/public/upload/phro/".$randomName, File::get($file));
            $data['attachement'] = $randomName;
        }

        PoldaHasRencanaOperasi::create($data);

        flash('Your data has been saved')->success();
        return redirect()->route('phro_index');
    }

    public function download($filePath)
    {
        PoldaHasRencanaOperasi::where("attachement", $filePath)->firstOrFail();
        return response()->download(storage_path("app/public/upload/phro/{$filePath}"));
    }
}
