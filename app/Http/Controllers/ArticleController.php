<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    public function data()
    {
        $model = Article::with(['user' => function ($query) {
            $query->select('id', 'email', 'name');
        }]);

        return datatables()->eloquent($model)->toJson();
    }

    public function index()
    {
        return view('article.index');
    }

    public function add()
    {
        return view('article.add');
    }

    public function save_process(ArticleRequest $request)
    {

        $data = [
            'uuid' => genUuid(),
            'topic' => $request->topic,
            'slug' => Str::of($request->topic)->slug('-'),
            'desc' => $request->desc,
            'status' => $request->status,
            'created_by' => myUserId(),
        ];

        if(request()->hasFile('small_img')) {
            $file = $request->file('small_img');
            $randomName = Str::random(20) . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('img/article/');
            $file->move($destinationPath, $randomName);
            $data['small_img'] = $randomName;
        }

        Article::create($data);

        flash('Artikel telah dibuat')->success();
        return redirect()->route('article_index');
    }

    public function edit(Article $articleUuid)
    {
        $category = Category::pluck('name', 'id');
        return view('article.edit', compact('articleUuid', 'category'));
    }

    public function update(ArticleRequest $articleUuid)
    {

        $data = [
            'topic' => request('topic'),
            'desc' => request('desc'),
            'status' => request('status'),
            'updated_by' => myUserId(),
        ];

        if(request()->hasFile('small_img')) {
            $file = $articleUuid->file('small_img');
            $randomName = Str::random(20) . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('img/article/');
            $file->move($destinationPath, $randomName);
            $data['small_img'] = $randomName;
        }

        Article::whereId(request('id'))->update($data);

        flash('Artikel telah diubah')->success();
        return redirect()->route('article_index');
    }

    public function delete(Article $articleUuid)
    {
        $articlePath = public_path('img/article/'.$articleUuid->small_img);

        if (file_exists($articlePath)) {
            unlink($articlePath);
        }

        $articleUuid->delete();
        flash('Artikel telah dihapus')->success();
        return redirect()->route('article_index');
    }
}
