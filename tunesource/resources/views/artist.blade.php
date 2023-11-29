<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('TuneSource') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="py-12">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($artists as $artist)
                    <div class="bg-white rounded-lg p-4 shadow-md">
                        <p class="text-gray-600"><img src="{{ $artist->image }}" alt=""></p>
                        <h2 class="text-lg font-semibold">{{ $artist->name }}</h2>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>


