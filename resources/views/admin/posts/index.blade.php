@extends('layouts.app')

@section('metaTitle', ' | Index')

@section('content')

    <div class="container">
        <h1 class="py-2">Tutti i post</h1>

        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Content</th>
                    <th scope="col">Published at</th>
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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
