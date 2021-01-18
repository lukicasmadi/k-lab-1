<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    public function data()
    {
        $model = Category::query();
        return app('datatables')->eloquent($model)->toJson();
    }

    public function index()
    {
        return view('category.index');
    }

    public function add(Request $request)
    {
        //
    }

    public function edit(Request $request, $id)
    {
        //
    }

    public function delete(Request $request, $id)
    {
        //
    }
}
