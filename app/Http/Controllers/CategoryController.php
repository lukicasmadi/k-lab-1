<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Storage;
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

    public function add()
    {
        return view('category.add');
    }

    public function save_process(CategoryRequest $request)
    {
        $data = [
            'name' => request('name'),
            'uuid' => genUuid(),
            'created_by' => myUserId(),
        ];

        if(request()->hasFile('category_image')) {
            $file = $request->file('category_image');
            $randomName = Str::random(20) . '.' . $file->getClientOriginalExtension();
            Storage::put("/public/upload/".$randomName, File::get($file));
            $data['img'] = $randomName;
        }

        Category::create($data);

        flash('Your data has been saved')->success();
        return redirect()->route('category_index');
    }

    public function update(CategoryRequest $request, Category $uuid)
    {
        $data = [
            'name' => request('name'),
            'created_by' => myUserId()
        ];

        if(request()->hasFile('category_image')) {
            $file = $request->file('category_image');

            $fileCheck = Storage::exists('/public/upload/'.$uuid->img);

            if($fileCheck) {
                Storage::delete('/public/upload/'.$uuid->img);
            }

            $randomName = Str::random(20) . '.' . $file->getClientOriginalExtension();
            Storage::put("/public/upload/".$randomName, File::get($file));
            $data['img'] = $randomName;
        }

        $data = Category::whereUuid($uuid->uuid)->update($data);

        flash('Your data has been updated')->success();
        return redirect()->route('category_index');
    }

    public function edit(Category $uuid)
    {
        return view('category.edit', compact('uuid'));
    }

    public function delete(Category $uuid)
    {
        $data = Category::has('article')->whereId($uuid->id)->count();

        if($data > 0) {
            flash("Can't delete data. This category is still used in articles")->error();
        } else {
            $fileCheck = Storage::exists('/public/upload/'.$uuid->img);

            if($fileCheck) {
                Storage::delete('/public/upload/'.$uuid->img);
            }

            Category::whereId($uuid->id)->delete();

            flash('Your data has been deleted')->success();
        }

        return redirect()->back();
    }
}
