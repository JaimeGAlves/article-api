<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

/**
 * @OA\Info(
 *     title="Article API",
 *     version="1.0.0"
 * )
 *
 * @OA\Tag(
 *     name="Articles",
 *     description="API endpoints for managing articles"
 * )
 */
class ArticleController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/articles",
     *     tags={"Articles"},
     *     summary="List all articles",
     *     @OA\Response(
     *         response=200,
     *         description="List of articles"
     *     )
     * )
     */
    public function index()
    {
        return Article::all();
    }

    /**
     * @OA\Post(
     *     path="/api/articles",
     *     tags={"Articles"},
     *     summary="Create a new article",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"title", "status"},
     *             @OA\Property(property="title", type="string"),
     *             @OA\Property(property="content", type="string"),
     *             @OA\Property(property="status", type="string", enum={"ativo", "inativo"})
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Article created successfully"
     *     )
     * )
     */
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

    /**
     * @OA\Get(
     *     path="/api/articles/{id}",
     *     tags={"Articles"},
     *     summary="Get a single article",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Article found"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Article not found"
     *     )
     * )
     */
    public function show(Article $article)
    {
        return $article;
    }

    /**
     * @OA\Put(
     *     path="/api/articles/{id}",
     *     tags={"Articles"},
     *     summary="Update an existing article",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"title", "status"},
     *             @OA\Property(property="title", type="string"),
     *             @OA\Property(property="content", type="string"),
     *             @OA\Property(property="status", type="string", enum={"ativo", "inativo"})
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Article updated successfully"
     *     )
     * )
     */
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

    /**
     * @OA\Delete(
     *     path="/api/articles/{id}",
     *     tags={"Articles"},
     *     summary="Delete an article",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Article deleted successfully"
     *     )
     * )
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return response()->json([
            'message' => "Article \"{$article->title}\" deleted successfully!"
        ], 200);         
    }
}
