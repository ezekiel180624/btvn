<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use Illuminate\Support\Facades\Storage;

class SongController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            if (!auth()->user()->isAdmin) {
                return redirect()->route('dashboard');
            } else {
                $songs = Song::all();
                return view('songs.index', compact('songs'));
            }
        }
    
        $songs = Song::all();
        return view('songs.index', compact('songs'));
    }

    public function create()
    {
        return view('songs.create');
    }

    public function store(Request $request)
    {
        $validatedData =$request->validate([
            'title' => 'required',
            'thumb' => 'required', 
            'link' => 'required',
            'artist' => 'required',
            'category' => 'required',
            'duration' => 'required',
        ]);
    
        $song = new Song();
        $song->title = $validatedData['title'];
        $song->artist = $validatedData['artist'];
        $song->category = $validatedData['category'];
        $song->duration = $validatedData['duration'];
    
        if ($request->hasFile('thumb')) {
            $thumb = $request->file('thumb');
            $thumbPath = $thumb->store('public/thumbs');
    
            // Assign the full path to the song's thumb field
            $song->thumb =Storage::url ($thumbPath);
            
        }

    
        if ($request->hasFile('link')) {
            $link = $request->file('link');
            $linkPath = $link->store('public/links');
    
            // Assign the full path to the song's link field
            $song->link =Storage::url ( $linkPath);
        }
          
        $song->save();

    
        return redirect()->route('songs.index')->with('success', 'Song created successfully.');
    }

    public function edit($id)
    {
        $song = Song::findOrFail($id);
        return view('songs.edit', compact('song'));
    }

    public function update(Request $request, $id)
    {
        $validatedData =$request->validate([
            'title' => 'required',
            'thumb' => 'required',
            'link' => 'required',
            'artist' => 'required',
            'category' => 'required',
            'duration' => 'required',
        ]);

        $song = Song::findOrFail($id);
        $song->title = $validatedData['title'];
        $song->artist = $validatedData['artist'];
        $song->category = $validatedData['category'];
        $song->duration = $validatedData['duration'];

        if ($request->hasFile('thumb')) {
            // Delete old thumb image if exists
            if ($song->thumb) {
                Storage::delete($song->thumb);
            }

            $thumb = $request->file('thumb');
            $thumbPath = $thumb->store('public/thumbs');
            $song->thumb = Storage::url($thumbPath);
        }

        if ($request->hasFile('link')) {
            // Delete old audio if exists
            if ($song->link) {
                Storage::delete($song->link);
            }

            $link = $request->file('link');
            $linkPath = $link->store('public/links');
            $song->link = Storage::url($linkPath);
        }

        $song->save();

        return redirect()->route('songs.index')->with('success', 'Song updated successfully.');
    }

    public function destroy($id)
    {
        $song = Song::findOrFail($id);
        $song->delete();

        return redirect()->route('songs.index')->with('success', 'Song deleted successfully.');
    }
}
