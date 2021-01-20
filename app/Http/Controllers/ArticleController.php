<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    public function data()
    {
        $model = Article::with(['user' => function ($query) {
            $query->select('id', 'email', 'name');
        }, 'category']);

        return datatables()->eloquent($model)->toJson();
    }

    public function index()
    {
        return view('article.index');
    }

    public function add()
    {
        $category = Category::pluck('name', 'id');
        return view('article.add', compact('category'));
    }

    public function save_process(ArticleRequest $request)
    {
        Article::create([
            'uuid' => genUuid(),
            'topic' => $request->topic,
            'desc' => $request->desc,
            'status' => $request->status,
            'category_id' => $request->category_id,
            'created_by' => auth()->user()->id,
        ]);

        flash('Your data has been saved')->success();
        return redirect()->route('article_index');
    }

    public function edit(Article $articleUuid)
    {
        $category = Category::pluck('name', 'id');
        return view('article.edit', compact('articleUuid', 'category'));
    }

    public function update(ArticleRequest $articleUuid)
    {
        $data = Article::whereId(request('id'))->update([
            'topic' => request('topic'),
            'desc' => request('desc'),
            'status' => request('status'),
            'category_id' => request('category_id'),
            'updated_by' => auth()->user()->id
        ]);

        flash('Your data has been updated')->success();
        return redirect()->route('article_index');
    }

    public function delete(Article $articleUuid)
    {
        $articleUuid->delete();
        flash('Your data has been deleted')->success();
        return redirect()->route('article_index');
    }
}
