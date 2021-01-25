<?php

namespace App\Http\Controllers;

use App\Models\Kesatuan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CreateUnitRequest;

class UnitController extends Controller
{

    public function data()
    {
        $model = Kesatuan::query();
        return datatables()->eloquent($model)->toJson();
    }

    public function index()
    {
        return view('kesatuan.index');
    }

    public function create()
    {
        return view('kesatuan.create');
    }

    public function store(CreateUnitRequest $request)
    {
        $data = [
            'uuid' => genUuid(),
            'name' => request('name'),
            'aka' => request('aka'),
            'profile' => request('profile'),
        ];

        if(request()->hasFile('logo')) {
            $file = $request->file('logo');
            $randomName = Str::random(20) . '.' . $file->getClientOriginalExtension();
            Storage::put("/public/upload/unit/".$randomName, File::get($file));
            $data['logo'] = $randomName;
        }

        Kesatuan::create($data);

        flash('Your data has been saved')->success();
        return redirect()->route('unit_index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $unit = Kesatuan::whereUuid($id)->firstOrFail();
        return view('kesatuan.edit', compact('unit'));
    }

    public function update(CreateUnitRequest $request, $uuid)
    {
        $data = [
            'name' => request('name'),
            'aka' => request('aka'),
            'profile' => request('profile'),
        ];

        if(request()->hasFile('logo')) {
            $file = $request->file('logo');
            $randomName = Str::random(20) . '.' . $file->getClientOriginalExtension();
            Storage::put("/public/upload/unit/".$randomName, File::get($file));
            $data['logo'] = $randomName;
        }

        Kesatuan::whereUuid($uuid)->firstOrFail()->update($data);

        flash('Your data has been updated')->success();
        return redirect()->route('unit_index');
    }

    public function destroy($id)
    {
        $data = Kesatuan::whereUuid($id)->firstOrFail();
        $data->delete();

        Storage::delete('/public/upload/unit/'.$data->logo);

        return response()->json([
            'output' => 'Your data has been deleted.',
        ], 200);
    }
}
