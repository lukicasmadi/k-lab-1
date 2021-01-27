<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\JenisPelanggaran;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ViolationRequest;
use Illuminate\Support\Facades\Storage;

class ViolationController extends Controller
{

    public function data()
    {
        $model = JenisPelanggaran::query();
        return datatables()->eloquent($model)->toJson();
    }

    public function index()
    {
        return view('violation.index');
    }

    public function create()
    {
        return view('violation.create');
    }

    public function store(ViolationRequest $request)
    {
        $data = [
            'name' => request('name'),
            'desc' => request('desc'),
        ];

        if(request()->hasFile('img')) {
            $file = $request->file('img');
            $randomName = Str::random(20) . '.' . $file->getClientOriginalExtension();
            Storage::put("/public/upload/violation/".$randomName, File::get($file));
            $data['img'] = $randomName;
        }

        JenisPelanggaran::create($data);

        flash('Your data has been saved')->success();
        return redirect()->route('violation_index');
    }

    public function edit($id)
    {
        $pelanggaran = JenisPelanggaran::whereUuid($id)->firstOrFail();
        return view('violation.edit', compact('pelanggaran'));
    }

    public function update(ViolationRequest $request, $uuid)
    {
        $data = [
            'name' => request('name'),
            'desc' => request('desc'),
        ];

        if(request()->hasFile('img')) {
            $file = $request->file('img');
            $randomName = Str::random(20) . '.' . $file->getClientOriginalExtension();
            Storage::put("/public/upload/violation/".$randomName, File::get($file));
            $data['img'] = $randomName;
        }

        JenisPelanggaran::whereUuid($uuid)->firstOrFail()->update($data);

        flash('Your data has been updated')->success();
        return redirect()->route('violation_index');
    }

    public function destroy($uuid)
    {
        $data = JenisPelanggaran::whereUuid($uuid)->firstOrFail();
        $data->delete();

        Storage::delete('/public/upload/violation/'.$data->img);

        return response()->json([
            'output' => 'Your data has been deleted.',
        ], 200);
    }
}
