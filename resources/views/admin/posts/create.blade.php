@extends('layouts.app')

@section('metaTitle', ' | Create')

@section('content')
    <div class="container">
        <div class="pb-4 d-flex justify-content-between align-items-center">
            <h1>Crea nuovo post</h1>
            <a class="btn btn-info" href="{{ route('admin.posts.index') }}">Torna all'Index</a>
        </div>

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
                <label for="category_id">Categoria</label>
                <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                    <option value="" selected disabled>Seleziona una categoria</option>
                    <option value="">Nessuna</option>
                    @foreach ($categories as $el)
                        <option {{ old('category_id') && old('category_id') == $el->id ? 'selected' : '' }}
                            value="{{ $el->id }}">{{ $el->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
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
                <input type="datetime-local" class="form-control @error('published_at') is-invalid @enderror"
                    name="published_at" id="published_at" value="{{ old('published_at') }}">
                @error('published_at')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="reset" class="btn btn-secondary">Reset</button>
            <button type="submit" class="btn btn-primary">Crea</button>
        </form>
    </div>
@endsection
