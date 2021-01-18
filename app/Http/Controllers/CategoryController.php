<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    public function data()
    {
        $model = Category::with(['user' => function ($query) {
            $query->select('id', 'email', 'name');
        }]);

        return datatables()->eloquent($model)->toJson();
    }

    public function index()
    {
        return view('category.index');
    }

    public function add(Request $request)
    {
        return view('category.add');
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
