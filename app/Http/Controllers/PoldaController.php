<?php

namespace App\Http\Controllers;

use App\Models\Polda;
use Illuminate\Http\Request;
use App\Http\Requests\PoldaRequest;

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
        //
    }

    public function store(PoldaRequest $request)
    {
        //
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
