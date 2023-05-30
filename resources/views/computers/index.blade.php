@extends('layout')

@section('title')
<title>Computers</title>
@endsection

@section('content')
<div class="max-w-7xl mx-auto p-6 lg:p-8">
    <div class="flex justify-center">
        <h1> Welcome Computers </h1>
    </div>

    <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400">
        @if (count($computers) > 0)
        <ul>
            @foreach ($computers as $computer)
            <a href="{{route('computers.show', ['computer' => $computer['id']])}}">
                <li>
                    <p>
                        {{ $computer['name'] }} ( {{ $computer['origin'] }} ) - <strong>{{ $computer['price'] }}$</strong>
                    </p>
                </li>
            </a>
            @endforeach
        </ul>
        @else
        <p> THere are no computers to display </p>
        @endif
    </div>
</div>
@endsection
