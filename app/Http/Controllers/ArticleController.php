<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        return Article::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'status' => 'required|in:ativo,inativo',
        ]);

        $article = Article::create($data);
        return response()->json($article, 201);
    }

    public function show(Article $article)
    {
        return $article;
    }

    public function update(Request $request, Article $article)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'status' => 'required|in:ativo,inativo',
        ]);

        $article->update($data);
        return $article;
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return response()->json([
            'message' => "Article '{$article->title}' deleted successfully!"
        ], 200);         
    }
}

