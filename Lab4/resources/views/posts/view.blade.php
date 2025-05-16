<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>show posts</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="container mx-auto px-4 py-8">
        <nav class="mb-6">
            <a href="{{ route('posts.index') }}" class="text-blue-600 hover:underline">All Posts</a>
        </nav>

        <h2 class="text-2xl font-semibold text-gray-700 mb-6">Post Info</h2>
        <div class="bg-white shadow-md rounded-lg p-6 mb-6">
            <h5 class="text-lg font-medium text-gray-900">Title: {{ $post->title }}</h5>
            <p class="text-gray-700 mt-2">Description: {{ $post->description }}</p>
        @if ($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="mt-2 w-32 h-32 object-cover">
        @endif
        </div>
        </div>

        <h2 class="text-2xl font-semibold text-gray-700 mb-4">Post Creator Info</h2>
        <div class="bg-white shadow-md rounded-lg p-6 mb-6">
            <p class="text-gray-700">Name: {{ $post->creator->name }}</p>
            <p class="text-gray-700">Email: {{ $post->creator->email }}</p>
            <p class="text-gray-700">Created At: {{ $post->created_at }}</p>
        </div>

        <h2 class="text-2xl font-semibold text-gray-700 mb-4">Comments</h2>
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @foreach ($post->comments as $comment)
            <div class="bg-white shadow-md rounded-lg p-4 mb-4">
                <p class="text-gray-700">{{ $comment->content }}</p>
                <p class="text-sm text-gray-500 mt-2">By: {{ $comment->user->name }} at {{ $comment->created_at }}</p>
            </div>
        @endforeach

        <h3 class="text-xl font-semibold text-gray-700 mb-4">Add a Comment</h3>
        <form action="{{ route('comments.store', $post) }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
            @csrf
            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-700">Comment</label>
                <textarea name="content" id="content" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-600 focus:border-indigo-600 sm:text-sm"></textarea>
                @error('content')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="inline-block rounded-sm border border-indigo-600 bg-indigo-600 px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:ring-3 focus:outline-hidden">Add Comment</button>
        </form>


    </div>
</body>
</html>