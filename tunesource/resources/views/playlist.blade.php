<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('TuneSource') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                {{-- <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }} 
                 </div> --}} 

                 <div class="container">
                    <h1 class="text-2xl font-bold mb-4">Playlist</h1>

                <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                  @foreach ($playlists as $playlist)
                <div class="bg-white rounded-lg p-4 shadow-md">
                    <p class="text-gray-600"><img src="{{ $playlist->image }}" alt=""></p>
                    <h2 class="text-lg font-semibold">{{ $playlist->title }}</h2>
                    <p class="text-gray-600">{{ $playlist->description }}</p>
                </div>
                 @endforeach
                 </div>
                 </div>                                       
            </div>
        </div>
    </div>
</x-app-layout>

