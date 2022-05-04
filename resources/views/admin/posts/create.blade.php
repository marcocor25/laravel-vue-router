@extends('layouts.app')

@section('metaTitle', ' | Create')

@section('content')
    <div class="container">
        <h1 class="py-2">Crea nuovo post</h1>

        <form action="{{ route('admin.posts.store') }}" method="POST">

            @csrf

            <div class="form-group">
                <label for="title">Titolo*</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
                    value="{{ old('title') }}" placeholder="Inserisci un titolo...">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="content">Contenuto del post*</label>
                <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="3"
                    placeholder="Inserisci testo...">{{ old('content') }}</textarea>
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="published_at">Data e ora di pubblicazione</label>
                <input type="datetime-local" class="form-control @error('published_at') is-invalid @enderror" name="published_at"
                    id="published_at" value="{{ old('published_at') }}">
                @error('published_at')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="reset" class="btn btn-secondary">Reset</button>
            <button type="submit" class="btn btn-primary">Crea</button>
        </form>
    </div>
@endsection
