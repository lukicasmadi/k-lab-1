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

            $data = [
                'name' => request('name'),
                'created_by' => auth()->user()->id,
                'uuid' => genUuid(),
            ];

            if(request()->hasFile('image')) {
                $file = $request->file('image');
                $randomName = Str::random(20) . '.' . $file->getClientOriginalExtension();
                $file->move(storage_path()."/app/public/upload", $randomName);
                $data['img'] = $randomName;
            }

            Category::create($data);

            flash('Your data has been saved')->success();
            return redirect()->route('category_index');
        }

        return view('category.add');
    }

    public function edit(Request $request, Category $uuid)
    {
        if ($request->isMethod('post')) {

            $data = [
                'name' => request('name'),
                'created_by' => auth()->user()->id
            ];

            if(request()->hasFile('image')) {
                $file = $request->file('image');
                $randomName = Str::random(20) . '.' . $file->getClientOriginalExtension();
                $file->move(storage_path()."/app/public/upload", $randomName);
                $data['img'] = $randomName;
            }

            $data = Category::whereId($request->uuid)->update($data);

            flash('Your data has been updated')->success();
            return redirect()->route('category_index');

        }

        return view('category.edit', compact('uuid'));
    }

    public function delete(Category $uuid)
    {
        $data = Category::has('article')->whereId($uuid->id)->count();

        if($data > 0) {
            flash("Can't delete data. This category is still used in articles")->error();
        } else {
            Category::whereId($uuid->id)->delete();
            flash('Your data has been deleted')->success();
        }

        return redirect()->back();
    }
}
