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
                'created_by' => auth()->user()->id
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

    public function edit(Request $request, Category $categoryId)
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

            $data = Category::whereId($request->id)->update($data);

            flash('Your data has been updated')->success();
            return redirect()->route('category_index');

        }

        return view('category.edit', compact('categoryId'));
    }

    public function delete(Category $categoryId)
    {
        $data = Category::has('article')->whereId($categoryId->id)->count();

        if($data > 0) {
            flash("Can't delete data. This category is still used in articles")->error();
        } else {
            Category::whereId($categoryId->id)->delete();
            flash('Your data has been deleted')->success();
        }

        return redirect()->back();
    }
}
