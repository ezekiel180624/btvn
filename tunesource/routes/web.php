<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

use App\Models\Song;
use App\Models\Playlist;
use App\Models\Artist;
use App\Http\Controllers\SongController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\GiftCardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    // return view('dashboard');
    $songs = Song::all();
    return view('dashboard', compact('songs'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/playlist', function () {
    // return view('playlist');
    $playlists = Playlist::all();
    return view('playlist', compact('playlists'));
})->middleware(['auth', 'verified'])->name('playlist'); 

Route::get('/artist', function () {
    // return view('playlist');
    $artists = Artist::all();
    return view('artist', compact('artists'));
})->middleware(['auth', 'verified'])->name('artist'); 


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/songs', [SongController::class, 'index'])->name('songs.index');
    Route::get('/songs/create', [SongController::class, 'create'])->name('songs.create');
    Route::post('/songs', [SongController::class, 'store'])->name('songs.store');
    Route::get('/songs/{song}/edit', [SongController::class, 'edit'])->name('songs.edit');
    Route::put('/songs/{song}', [SongController::class, 'update'])->name('songs.update');
    Route::delete('/songs/{song}', [SongController::class, 'destroy'])->name('songs.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/search', [SearchController::class, 'search'])->name('song.search');
});

Route::middleware('auth')->group(function () {
    Route::get('/gift-cards', [GiftCardController::class, 'index'])->name('gift-cards.index');
    Route::get('/gift-cards/create', [GiftCardController::class, 'create'])->name('gift-cards.create');
    Route::post('/gift-cards', [GiftCardController::class, 'store'])->name('gift-cards.store');
    Route::get('/gift-cards/{id}', [GiftCardController::class, 'show'])->name('gift-cards.show');
    Route::get('/gift-cards/{id}/edit', [GiftCardController::class, 'edit'])->name('gift-cards.edit');
    Route::put('/gift-cards/{id}', [GiftCardController::class, 'update'])->name('gift-cards.update');
    Route::delete('/gift-cards/{id}', [GiftCardController::class, 'destroy'])->name('gift-cards.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/songs', [SongController::class, 'index'])->name('songs.index');
    Route::get('/songs/create', [SongController::class, 'create'])->name('songs.create');
    Route::post('/songs', [SongController::class, 'store'])->name('songs.store');
    Route::get('/songs/{song}/edit', [SongController::class, 'edit'])->name('songs.edit');
    Route::put('/songs/{song}', [SongController::class, 'update'])->name('songs.update');
    Route::delete('/songs/{song}', [SongController::class, 'destroy'])->name('songs.destroy');
});


require __DIR__.'/auth.php';
