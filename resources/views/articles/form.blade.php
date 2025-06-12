@extends('layouts.article')

@section('title', isset($article) ? 'Edit Article' : 'Create Article')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-8">
    <h2 class="text-3xl font-bold mb-6 text-center text-red-400">
        {{ isset($article) ? 'Edit Article' : 'Create Article' }}
    </h2>

    <form action="{{ isset($article) ? url('/articles/' . $article->id) : url('/articles') }}" method="POST" class="space-y-6">
        @csrf
        @if(isset($article))
            @method('PUT')
        @endif

        <div>
            <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $article->title ?? '') }}"
                   class="mt-1 block w-full bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500">
        </div>

        <div>
            <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Content</label>
            <textarea name="content" id="content" rows="5"
                      class="mt-1 block w-full bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500">{{ old('content', $article->content ?? '') }}</textarea>
        </div>

        <div>
            <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Status</label>
            <select name="status" id="status"
                    class="mt-1 block w-full bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500">
                <option value="ativo" {{ old('status', $article->status ?? '') == 'ativo' ? 'selected' : '' }}>Active</option>
                <option value="inativo" {{ old('status', $article->status ?? '') == 'inativo' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <div class="flex justify-between">
            <button type="submit"
                    class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded shadow">
                {{ isset($article) ? '✏️' : '✚' }}
            </button>
        </div>
    </form>
</div>
@endsection
