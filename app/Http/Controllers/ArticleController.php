<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
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
