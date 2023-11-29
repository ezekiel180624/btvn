<!-- songs/index.blade.php -->
<x-app-layout>

<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('TuneSource') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

<h1 class="tieude">Songs</h1>

<a href="{{ route('songs.create') }}" class="create">Create Song</a>

<table>
    <thead>
        <tr>
            <th>Index</th>
            <th>Title</th>
            <th>Thumbnail</th>
            <th>Audio</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($songs as $song)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $song->title }}</td>
            <td><img src="{{ asset($song->thumb) }}" alt="{{ $song->title }}" width="100"></td>
            <td>
                <audio controls>
                    <source src="{{ asset($song->link) }}" type="audio/mp3">
                    Your browser does not support the audio element.
                </audio>
            </td>
            <td>
                <button type="submit"><a href="{{ route('songs.edit', $song) }}">Edit</a></button>
                <form action="{{ route('songs.destroy', $song) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
            </div>
        </div>
    </div>
</x-app-layout>


<style>
    .tieude {
        font-size: 24px;
        margin-bottom: 10px;
        text-align: center;
    }

    .create {
        padding: 5px 10px;
        border: none;
        color: black;
        cursor: pointer;
    }

    .create:hover {
        background-color: greenyellow;
        color:blue;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    img {
        max-width: 100px;
        height: auto;
    }

    form {
        display: inline;
    }

    button {
        padding: 5px 10px;
        border: none;
        background-color: #dc3545;
        color: black;
        cursor: pointer;
    }

    button:hover {
        background-color: #c82333;
        color: #fff;
    }
</style>



