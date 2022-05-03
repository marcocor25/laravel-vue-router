@extends('layouts.app')

@section('content')
    <table>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Slug</th>
            <th>Content</th>
            <th>Published at</th>
        </tr>

        @foreach ($posts as $el)
            <tr>
                <td>
                    <strong>{{ $el->id }}</strong>
                </td>
                <td class="title">{{ $el->title }}</td>
                <td>{{ $el->slug }}</td>
                <td>{{ $el->content }}</td>
                <td>
                    @if ($el->published_at == '')
                        NULL
                    @else
                        {{ $el->published_at }}
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
@endsection
