<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
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
        $method = $request->method();

        if ($request->isMethod('post')) {

            if(request()->hasFile('image')) {
                $file = $request->file('image');
                $randomName = Str::random(20) . '.' . $file->getClientOriginalExtension();
                $file->move(storage_path()."/app/public/upload", $randomName);
            }

            Category::create([
                'name' => request('name'),
                'img' => $randomName,
                'created_by' => auth()->user()->id
            ]);

            flash('Your data has been saved')->success();
            return redirect()->route('category_index');
        }

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
