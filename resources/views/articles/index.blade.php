@extends('layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Articles</h1>
        <a href="{{ route('articles.create') }}" class="btn btn-primary">New Article</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($articles->isEmpty())
        <div class="alert alert-info">No articles found.</div>
    @else
        <table class="table table-bordered bg-white shadow-sm">
            <thead class="table-light">
                <tr>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th style="width: 160px">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($articles as $article)
                    <tr>
                        <td>{{ $article->title }}</td>
                        <td>
                            <span class="badge bg-{{ $article->status === 'ativo' ? 'success' : 'secondary' }}">
                                {{ ucfirst($article->status) }}
                            </span>
                        </td>
                        <td>{{ $article->created_at->format('Y-m-d H:i') }}</td>
                        <td>
                            <a href="{{ route('articles.edit', $article) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('articles.destroy', $article) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this article?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
