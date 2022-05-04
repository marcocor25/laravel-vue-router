@extends('layouts.app')

@section('metaTitle', ' | Edit')

@section('content')

    <div class="container">
        <div class="pb-4 d-flex justify-content-between align-items-center">
            <div>
                <h1>Modifica:</h1>
                <h2>{{ $post->title }}</h2>
            </div>
            <a class="btn btn-info" href="{{ route('admin.posts.index') }}">Torna all'Index</a>
        </div>

        <form action="{{ route('admin.posts.update', $post) }}" method="POST">

            @csrf

            @method('PUT')

            <div class="form-group">
                <label for="title">Titolo*</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
                    value="{{ old('title') ?: $post->title }}" placeholder="Inserisci un titolo...">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="content">Contenuto del post*</label>
                <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="3"
                    placeholder="Inserisci testo...">{{ old('content') ?: $post->content }}</textarea>
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="published_at">Data e ora di pubblicazione</label>
                <input type="datetime-local" class="form-control @error('published_at') is-invalid @enderror"
                    name="published_at" id="published_at" value="{{ old('published_at') ?: $post->published_at }}">
                @error('published_at')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="reset" class="btn btn-secondary">Reset</button>
            <button type="submit" class="btn btn-primary">Salva</button>
        </form>

    </div>

@endsection
