<?php

namespace App\Http\Controllers;

use App\Models\Polda;
use Illuminate\Http\Request;
use App\Http\Requests\PoldaRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PoldaController extends Controller
{

    public function data()
    {
        $model = Polda::query();
        return datatables()->eloquent($model)->toJson();
    }

    public function index()
    {
        return view('polda.index');
    }

    public function create()
    {
        return view('polda.create');
    }

    public function store(PoldaRequest $request)
    {
        $data = [
            'name' => request('name'),
            'aka' => request('aka'),
            'province' => request('province'),
            'city' => request('city'),
            'address' => request('address'),
            'profile' => request('profile'),
        ];

        if(request()->hasFile('small_img')) {
            $file = $request->file('small_img');
            $randomName = Str::random(20) . '.' . $file->getClientOriginalExtension();
            Storage::put("/public/upload/polda/".$randomName, File::get($file));
            $data['small_img'] = $randomName;
        }

        if(request()->hasFile('big_img')) {
            $file = $request->file('big_img');
            $randomName = Str::random(20) . '.' . $file->getClientOriginalExtension();
            Storage::put("/public/upload/polda/".$randomName, File::get($file));
            $data['big_img'] = $randomName;
        }

        if(request()->hasFile('logo')) {
            $file = $request->file('logo');
            $randomName = Str::random(20) . '.' . $file->getClientOriginalExtension();
            Storage::put("/public/upload/polda/".$randomName, File::get($file));
            $data['logo'] = $randomName;
        }

        Polda::create($data);

        flash('Your data has been saved')->success();
        return redirect()->route('polda_index');
    }

    public function show($uuid)
    {
        //
    }

    public function edit($uuid)
    {
        //
    }

    public function update(PoldaRequest $request, $uuid)
    {
        //
    }

    public function destroy($uuid)
    {
        //
    }
}
