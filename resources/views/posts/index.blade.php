<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Posts</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        [x-cloak] { display: none !important; }
    </style>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-pink-50 min-h-screen p-6 md:p-12">

    <div class="max-w-3xl mx-auto">
        <div class="flex justify-between items-center mb-10">
            <h1 class="text-3xl font-bold text-pink-600 tracking-tight">My Daily Journal</h1>
            <a href="{{ route('posts.create') }}" class="bg-pink-500 hover:bg-pink-600 text-white px-6 py-2 rounded-full shadow-lg transition-all duration-300 transform hover:scale-105 font-medium">
                + New Post
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-400 text-green-700 p-4 mb-6 rounded shadow-sm animate-bounce">
                {{ session('success') }}
            </div>
        @endif

        <div class="space-y-6">
            @foreach($posts as $post)
            <div class="bg-white p-6 rounded-3xl shadow-sm border border-pink-100 hover:shadow-md transition-shadow">
                <h2 class="text-xl font-semibold text-gray-800 mb-2">
                    <a href="{{ route('posts.show', $post->id) }}" class="hover:text-pink-500 transition-colors">
                        {{ $post->title }}
                    </a>
                </h2>
                <p class="text-gray-500 leading-relaxed mb-4">
                    {{ Str::limit($post->text, 100) }}
                </p>

                <div class="flex items-center justify-between border-t border-pink-50 pt-4">
                    <div class="flex space-x-4 items-center">
                        <a href="{{ route('posts.edit', $post->id) }}" class="text-sm font-semibold text-pink-400 hover:text-pink-600 uppercase tracking-wider">Edit</a>
                        
                        <div x-data="{ open: false }">
                            <button @click="open = true" type="button" class="text-sm font-semibold text-gray-400 hover:text-red-400 uppercase tracking-wider transition-colors">
                                Delete
                            </button>

                            <div x-show="open" 
                                 x-transition:enter="transition ease-out duration-300"
                                 x-transition:enter-start="opacity-0"
                                 x-transition:enter-end="opacity-100"
                                 class="fixed inset-0 z-50 flex items-center justify-center bg-pink-900/20 backdrop-blur-sm p-4" 
                                 x-cloak>
                                
                                <div @click.away="open = false" 
                                     class="bg-white p-8 rounded-[2rem] shadow-2xl max-w-sm w-full border border-pink-100 text-center">
                                    <div class="w-16 h-16 bg-pink-100 text-pink-500 rounded-full flex items-center justify-center mx-auto mb-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                        </svg>
                                    </div>
                                    <h3 class="text-xl font-bold text-gray-800 mb-2">Are you sure?</h3>
                                    <p class="text-gray-500 mb-8 text-sm">This memory will be gone forever.</p>
                                    
                                    <div class="flex gap-3">
                                        <button @click="open = false" class="flex-1 px-4 py-3 bg-gray-50 hover:bg-gray-100 text-gray-500 font-semibold rounded-2xl transition-all">
                                            Cancel
                                        </button>
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="flex-1">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="w-full px-4 py-3 bg-pink-500 hover:bg-pink-600 text-white font-semibold rounded-2xl shadow-lg shadow-pink-200 transition-all">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    <span class="text-xs text-pink-300 italic">{{ $post->created_at->diffForHumans() }}</span>
                </div>
            </div>
            @endforeach

            @if($posts->isEmpty())
                <div class="text-center py-20">
                    <p class="text-pink-300 text-lg">Your journal is empty. Start writing!</p>
                </div>
            @endif
        </div>
    </div>

</body>
</html>