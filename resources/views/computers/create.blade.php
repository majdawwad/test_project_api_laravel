@extends('layout')

@section('title')
<title>Create Computers</title>
@endsection

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="flex justify-center m-10">
        <h1> Create New a Computer </h1>
    </div>

    <div class="flex justify-center">
        <form action="{{route('computers.store')}}" , method="POST">
            @csrf
            <div>
                <label for="computer-name" class="text-sm">Computer Name</label>
                <input id="computer-name" name="computer-name" value="{{old('computer-name')}}" type="text">
                @error ('computer-name')
                   <div class="form-error">
                      {{$message}}
                   </div>
                @enderror
            </div>

            <div>
                <label for="computer-origin" class="text-sm">Computer Origin</label>
                <input id="computer-origin" , name="computer-origin" value="{{old('computer-origin')}}" type="text">
                @error ('computer-origin')
                   <div class="form-error">
                      {{$message}}
                   </div>
                @enderror
            </div>

            <div>
                <label for="computer-price" class="text-sm">Computer Price</label>
                <input id="computer-price" name="computer-price" value="{{old('computer-price')}}" type="text">
                @error ('computer-price')
                   <div class="form-error">
                      {{$message}}
                   </div>
                @enderror
            </div>

            <div>
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>

</div>
@endsection
