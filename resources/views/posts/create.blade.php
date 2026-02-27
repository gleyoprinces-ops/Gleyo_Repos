<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Entry ✨</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-pink-50 min-h-screen flex items-center justify-center p-6">

    <div class="w-full max-w-md">
        <a href="{{ route('posts.index') }}" class="text-pink-400 hover:text-pink-600 text-sm font-medium mb-6 inline-block transition-colors">
            ← Back to journal
        </a>

        <div class="bg-white p-8 rounded-[2rem] shadow-xl shadow-pink-100 border border-pink-100">
            <h1 class="text-2xl font-bold text-gray-800 mb-2">New Entry</h1>
            <p class="text-pink-400 text-sm mb-8">Capture your thoughts for today...</p>

            <form action="{{ route('posts.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <div>
                    <label class="block text-xs font-semibold uppercase tracking-wider text-gray-400 mb-2 ml-1">Title</label>
                    <input type="text" name="title" placeholder="Give it a name..." 
                        class="w-full px-5 py-3 rounded-2xl border border-pink-50 focus:border-pink-300 focus:ring-2 focus:ring-pink-100 outline-none transition-all placeholder:text-gray-300 bg-pink-50/30" required>
                </div>

                <div>
                    <label class="block text-xs font-semibold uppercase tracking-wider text-gray-400 mb-2 ml-1">Content</label>
                    <textarea name="text" rows="5" placeholder="What's on your mind?" 
                        class="w-full px-5 py-3 rounded-2xl border border-pink-50 focus:border-pink-300 focus:ring-2 focus:ring-pink-100 outline-none transition-all placeholder:text-gray-300 bg-pink-50/30" required></textarea>
                </div>

                <button type="submit" 
                    class="w-full bg-pink-500 hover:bg-pink-600 text-white font-semibold py-4 rounded-2xl shadow-lg shadow-pink-200 transition-all active:scale-95">
                    Save Memory
                </button>
            </form>
        </div>
    </div>

</body>
</html>