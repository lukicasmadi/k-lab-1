<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

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
