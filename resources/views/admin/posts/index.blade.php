@extends('layouts.app')

@section('metaTitle', ' | Index')

@section('content')

    <div class="container">

        <div class="pb-4 d-flex justify-content-between align-items-center">
            <h1>Tutti i post</h1>
            <a class="btn btn-dark" href="{{ route('admin.posts.create') }}">Nuovo post</a>
        </div>

        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Contenuto</th>
                    <th scope="col">Data</th>
                    <th scope="col">Modifica</th>
                    <th scope="col">Cancella</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $el)
                    <tr>
                        <td class="font-weight-bold">{{ $el->id }}</td>
                        <td class="text-capitalize">{{ $el->title }}</td>
                        <td>{{ $el->slug }}</td>
                        <td>{{ $el->content }}</td>
                        <td>
                            @if ($el->published_at == '')
                                <u>NULL</u>
                            @else
                                {{ $el->published_at }}
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-success px-4" href="{{ route('admin.posts.edit', $el) }}">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('admin.posts.destroy', $el) }}" method="POST">

                                @csrf

                                @method('DELETE')

                                <button type="submit" class="btn btn-danger px-4">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>

                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
