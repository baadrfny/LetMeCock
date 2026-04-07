<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Favorites') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-800 mb-2">My Favorite Recipes</h1>
                <p class="text-gray-600">Recipes you've saved for later</p>
            </div>

            <!-- Success/Error Messages -->
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Favorites List -->
            @auth
                @if(auth()->user()->favorites->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach(auth()->user()->favorites as $favorite)
                            <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 overflow-hidden">
                                <!-- Recipe Image -->
                                @if($favorite->recipe->image)
                                    <img src="{{ asset('storage/' . $favorite->recipe->image) }}" 
                                         alt="{{ $favorite->recipe->name }}" 
                                         class="w-full h-48 object-cover">
                                @else
                                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                @endif

                                <!-- Recipe Info -->
                                <div class="p-4">
                                    <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $favorite->recipe->name }}</h3>
                                    <p class="text-gray-600 text-sm mb-3 line-clamp-2">{{ $favorite->recipe->description }}</p>
                                    
                                    <!-- Category Badge -->
                                    <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full mb-3">
                                        {{ $favorite->recipe->category->name }}
                                    </span>

                                    <!-- Actions -->
                                    <div class="flex justify-between items-center">
                                        <a href="{{ route('recipes.show', $favorite->recipe->id) }}" 
                                           class="text-blue-600 hover:text-blue-800 font-medium text-sm">
                                            View Recipe
                                        </a>
                                        
                                        <form action="{{ route('favorites.destroy', $favorite->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="text-red-600 hover:text-red-800 font-medium text-sm"
                                                    onclick="return confirm('Remove from favorites?')">
                                                Remove
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <!-- Empty State -->
                    <div class="text-center py-12">
                        <div class="w-24 h-24 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0L3.82 9.818a4.5 4.5 0 000 6.364l6.364 6.364z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">No favorites yet</h3>
                        <p class="text-gray-600 mb-4">Start adding recipes to your favorites to see them here!</p>
                        <a href="{{ route('dashboard') }}" 
                           class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-medium transition-colors">
                            Browse Recipes
                        </a>
                    </div>
                @endif
            @else
                <!-- Not Logged In -->
                <div class="text-center py-12">
                    <div class="w-24 h-24 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Please log in</h3>
                    <p class="text-gray-600 mb-4">You need to be logged in to view your favorite recipes.</p>
                    <a href="{{ route('login') }}" 
                       class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-medium transition-colors">
                        Log In
                    </a>
                </div>
            @endauth
        </div>
    </div>
</x-app-layout>
