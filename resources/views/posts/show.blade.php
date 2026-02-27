<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }} ✨</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-pink-50 min-h-screen p-6 md:p-12">

    <div class="max-w-2xl mx-auto">
        <div class="flex justify-between items-center mb-8">
            <a href="{{ route('posts.index') }}" class="text-pink-400 hover:text-pink-600 font-medium transition-colors">
                ← Back to Journal
            </a>
            <div class="flex space-x-3">
                <a href="{{ route('posts.edit', $post->id) }}" class="bg-white text-pink-500 border border-pink-100 px-4 py-2 rounded-full text-sm font-semibold hover:bg-pink-50 transition-all">
                    Edit
                </a>
            </div>
        </div>

        <article class="bg-white rounded-[2.5rem] shadow-xl shadow-pink-100/50 border border-white overflow-hidden">
            <div class="h-3 bg-gradient-to-r from-pink-200 via-pink-400 to-pink-200"></div>
            
            <div class="p-8 md:p-12">
                <div class="mb-6">
                    <span class="text-xs font-bold uppercase tracking-widest text-pink-300">Entry Detail</span>
                    <h1 class="text-4xl font-bold text-gray-800 mt-2 leading-tight">
                        {{ $post->title }}
                    </h1>
                    <p class="text-sm text-pink-300 mt-4 italic">
                        Published {{ $post->created_at->format('M d, Y') }} • {{ $post->created_at->diffForHumans() }}
                    </p>
                </div>

                <div class="prose prose-pink text-gray-600 leading-relaxed text-lg">
                    {{-- nl2br makes sure line breaks in the textarea show up on the page --}}
                    {!! nl2br(e($post->text)) !!}
                </div>
            </div>
        </article>

        <div class="mt-8 text-center">
             <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Archive this memory forever?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-gray-400 hover:text-red-400 text-xs font-semibold uppercase tracking-widest transition-colors">
                    Delete this entry
                </button>
            </form>
        </div>
    </div>

</body>
</html>