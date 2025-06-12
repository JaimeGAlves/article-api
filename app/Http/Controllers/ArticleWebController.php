<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleWebController extends Controller
{
    public function index()
    {
        $articles = Article::orderByDesc('created_at')->get();
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        return view('articles.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'status' => 'required|in:ativo,inativo'
        ]);

        Article::create($data);

        return redirect()->route('articles.index')
                         ->with('success', 'Article created successfully!');
    }

    public function show(Article $article)
    {
        $articles = collect([$article]);
        return view('articles.index', compact('articles'));
    }

    public function edit(Article $article)
    {
        return view('articles.form', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'status' => 'required|in:ativo,inativo'
        ]);

        $article->update($data);

        return redirect()->route('articles.index')
                         ->with('success', 'Article updated successfully!');
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('articles.index')
                         ->with('success', 'Article deleted successfully!');
    }
}
