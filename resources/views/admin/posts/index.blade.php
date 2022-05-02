@extends('layouts.app')

@section('content')
    <ul>
        @foreach ($posts as $el)
            <li>
                <h3>{{ $el->title }}</h3>
                <p>{{ $el->slug }}</p>
            </li>
        @endforeach
    </ul>
@endsection
