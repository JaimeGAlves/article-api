@extends('layouts.article')

@section('title', 'List of article')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8">
    <h2 class="text-3xl font-bold mb-6 text-center text-red-400">Article</h2>

    <div class="flex justify-end mb-6 md:grid-cols-2">
        <a href="/articles/create" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded shadow">
            ✚
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
        <table class="w-full table-auto">
            <thead class="bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left">Title</th>
                    <th class="px-4 py-2 text-left">Status</th>
                    <th class="px-4 py-2 text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($articles as $article)
                    <tr class="border-t border-gray-200 dark:border-gray-700">
                        <td class="px-4 py-2">{{ $article->title }}</td>
                        <td class="px-4 py-2 text-lg">
                            {{ $article->status === 'ativo' ? '✅' : '❌' }}
                        </td>
                        <td class="px-4 py-2 space-x-2 text-lg text-right">
                            <a href="/articles/{{ $article->id }}" title="Ver">👁️</a>
                            <a href="/articles/{{ $article->id }}/edit" title="Editar">✏️</a>
                            <form action="/articles/{{ $article->id }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure you want to delete?')" title="Excluir">🗑️</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center px-4 py-6 text-gray-500 dark:text-gray-400">No articles found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
