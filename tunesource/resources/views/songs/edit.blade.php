<!-- songs/edit.blade.php -->
<x-app-layout>

<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('TuneSource') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
<h1>Edit Song</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('songs.update', $song) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label for="title">Title:</label>
    <input type="text" name="title" id="title" value="{{ $song->title }}" required>
    <br>
    <label for="thumb">Thumbnail URL:</label>
    <input type="file" name="thumb" id="thumb"  required>
    <br>
    <label for="link">Song Link:</label>
    <input type="file" name="link" id="link"  required>
    <br>
    <label for="artist">Artist:</label>
    <input type="text" name="artist" id="artist" value="{{ $song->artist }}" required>
    <br>
    <label for="category">Category:</label>
    <input type="text" name="category" id="category" value="{{ $song->category }}" required>
    <br>
    <label for="duration">Duration:</label>
    <input type="text" name="duration" id="duration" value="{{ $song->duration }}" required>
    <br>
    <button type="submit"><a href="{{ route('songs.index') }}">Back</a></button>
    <button type="submit">Update</button>
</form>
</div>
        </div>
    </div>
</x-app-layout>

<style>
    body {
        font-family: Arial, sans-serif;
        text-align: center;
    }
    
    h1 {
        margin-top: 50px;
        font-size: 30px;
    }

    form {
        margin-top: 20px;
    }

    label {
        display: block;
        margin-top: 10px;
    }

    input[type="text"] {
        padding: 8px;
        width: 300px;
    }

    button[type="submit"] {
        padding: 8px 15px;
        background-color: #4CAF50;
        color: #fff;
        border: none;
        cursor: pointer;
        margin-top: 10px;
    }

    button:hover{
       background-color: darkgreen;
    }
    
    ul {
        list-style-type: none;
        padding: 0;
        margin-top: 10px;
    }
    
    li {
        color: red;
        margin-bottom: 5px;
    }
</style>
