@extends('layout')

@section('content')
    <h1 class="h3 mb-4">
        {{ $article->exists ? 'Edit Article' : 'Create Article' }}
    </h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>There were errors:</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ $action }}" method="POST">
        @csrf
        @if ($method === 'PUT')
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
            <input type="text" name="title" id="title" class="form-control"
                   value="{{ old('title', $article->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" id="content" rows="4" class="form-control">{{ old('content', $article->content) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
            <select name="status" id="status" class="form-select" required>
                <option value="ativo" {{ old('status', $article->status) === 'ativo' ? 'selected' : '' }}>Active</option>
                <option value="inativo" {{ old('status', $article->status) === 'inativo' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('articles.index') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-success">
                {{ $article->exists ? 'Update' : 'Create' }}
            </button>
        </div>
    </form>
@endsection
