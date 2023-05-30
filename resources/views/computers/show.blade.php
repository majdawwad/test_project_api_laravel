@extends('layout')

@section('title')
<title>Show Computers</title>
@endsection

@section('content')
<div class="max-w-7xl mx-auto p-6 lg:p-8">
    <div class="flex justify-center">
        <h1> Welcome Computers </h1>
    </div>

    <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400">

        <p>
        {{ $computer['name'] }} ( {{ $computer['origin'] }} ) - <strong>{{ $computer['price'] }}$</strong>
        </p>

    </div>

    <a class="edit-btn" href="{{route('computers.edit', $computer->id)}}">edit</a>

    <form  action="{{route('computers.destroy', $computer->id)}}" method="POST">
        @csrf
        @method('DELETE')
        
        <input class="delete-btn" type="submit" value="delete">
    </form>

</div>
@endsection
