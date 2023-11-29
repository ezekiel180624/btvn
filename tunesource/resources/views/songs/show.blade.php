<!-- songs/show.blade.php -->

<h1>{{ $song->title }}</h1>

<p><strong>Artist:</strong> {{ $song->artist }}</p>
<p><strong>Category:</strong> {{ $song->category }}</p>
<p><strong>Duration:</strong> {{ $song->duration }}</p>
<img src="{{ $song->thumb }}"alt="{{ $song->title }}" width="200">
<audio controls>
    <source src="{{ $song->link }}" type="audio/mpeg">
    Your browser does not support the audio element.
</audio>

<a href="{{ route('songs.edit', $song) }}">Edit</a>
<form action="{{ route('songs.destroy', $song) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
</form>