<!DOCTYPE html>
<html>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('TuneSource') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="py-12">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
<head>
    <title>Song Search</title>
</head>
<body>
    <h1>Song Search</h1>
    <form action="{{ route('song.search') }}" method="GET">
        <input type="text" name="query" placeholder="Enter a song title">
        <button type="submit">Search</button>
    </form>

    <!-- Display search results -->
    <div>
        <h2>Search Results</h2>
        <ul>
            @foreach ($results as $result)
                <li>{{ $result->title }} - {{ $result->artist }} - 
                    <audio controls>                                   
                    <source src="{{ $result->link }}" type="audio/mp3">
                        Your browser does not support the audio element.
                    </audio>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</div>
        </div>
    </div>
</x-app-layout>

<style>
  .max-w-7xl {
            max-width: 80rem;
            margin-left: auto;
            margin-right: auto;
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto;
        }

        .sm\:px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }

        .lg\:px-8 {
            padding-left: 2rem;
            padding-right: 2rem;
        }

        .py-12 {
            padding-top: 3rem;
            padding-bottom: 3rem;
        }

        .grid {
            display: grid;
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr));
        }

        .grid-cols-2 {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .grid-cols-3 {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }

        .gap-4 {
            gap: 1rem;
        }

        /* Additional styles for the rest of the HTML code */

        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            padding: 20px;
            margin: 0;
        }

        h1 {
            color: #333;
            font-size: 32px;
            margin-bottom: 20px;
            text-align: center;
        }

        form {
            display: flex;
            justify-content: center;
            margin-bottom: 40px;
        }

        input[type="text"] {
            padding: 10px;
            width: 300px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        button[type="submit"] {
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button[type="submit"]:hover{
            background-color: blue;
        }

       

        h2 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }

        ul {
            list-style-type: none;
            padding: 0;
            display: grid;
            gap: 20px;
        }

        li {
            padding: 10px;
            background-color: #fff;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        li:hover {
            background-color: #f0f0f0;
        }

        audio {
            margin-top: 10px;
            display: block;
        }
</style>