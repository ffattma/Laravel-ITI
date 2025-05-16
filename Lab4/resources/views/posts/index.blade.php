<html>
<head>
<!-- <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> -->
@vite('resources/css/app.css')
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous"> -->
</head>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script> -->
<body> 

    <div class="container mx-auto px-4 py-8">
        <nav class="mb-6">
            <a href="{{ route('posts.index') }}" class="text-blue-600 hover:underline">All Posts</a>
        </nav>

        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('posts.create') }}" class="inline-block rounded-sm border border-indigo-600 bg-indigo-600 px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:ring-3 focus:outline-hidden mb-6">Add New Post</a>

        <table class="min-w-full divide-y-2 divide-gray-200">
            <thead class="ltr:text-left rtl:text-right">
                <tr>
                    <th class="px-3 py-2 whitespace-nowrap">id</th>
                    <th class="px-3 py-2 whitespace-nowrap">title</th>
                    <th class="px-3 py-2 whitespace-nowrap">description</th>
                    <th class="px-3 py-2 whitespace-nowrap">created by</th>
                    <th class="px-3 py-2 whitespace-nowrap">actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($posts as $post)
                    <tr class="*:text-gray-900 *:first:font-medium">
                        <td class="px-3 py-2 whitespace-nowrap">{{ $post->id }}</td>
                        <td class="px-3 py-2 whitespace-nowrap">{{ $post->title }}</td>
                        <td class="px-3 py-2 whitespace-nowrap">{{ $post->description }}</td>
                        <td class="px-3 py-2 whitespace-nowrap">{{ $post->creator->name }}</td>
                        <td class="px-3 py-2 whitespace-nowrap flex space-x-2">
                            <a href="{{ route('posts.view', $post) }}" class="inline-block rounded-sm border border-indigo-600 bg-indigo-600 px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:ring-3 focus:outline-hidden">view</a>
                            <a href="{{ route('posts.edit', $post) }}" class="inline-block rounded-sm border border-indigo-600 bg-indigo-600 px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:ring-3 focus:outline-hidden">edit</a>
                            <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-block rounded-sm border border-indigo-600 bg-red-600 px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:ring-3 focus:outline-hidden">delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-6">
            {{ $posts->links('pagination::tailwind') }}
        </div>

        <h2 class="text-2xl font-semibold text-gray-700 mt-12 mb-4">Deleted Posts</h2>
        @php
            $deletedPosts = App\Models\Post::onlyTrashed()->get();
        @endphp
        <table class="min-w-full divide-y-2 divide-gray-200">
            <thead class="ltr:text-left rtl:text-right">
                <tr>
                    <th class="px-3 py-2 whitespace-nowrap">id</th>
                    <th class="px-3 py-2 whitespace-nowrap">title</th>
                    <th class="px-3 py-2 whitespace-nowrap">description</th>
                    <th class="px-3 py-2 whitespace-nowrap">created by</th>
                    <th class="px-3 py-2 whitespace-nowrap">actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($deletedPosts as $deletedPost)
                    <tr class="*:text-gray-900 *:first:font-medium">
                        <td class="px-3 py-2 whitespace-nowrap">{{ $deletedPost->id }}</td>
                        <td class="px-3 py-2 whitespace-nowrap">{{ $deletedPost->title }}</td>
                        <td class="px-3 py-2 whitespace-nowrap">{{ $deletedPost->description }}</td>
                        <td class="px-3 py-2 whitespace-nowrap">{{ $deletedPost->creator->name }}</td>
                        <td class="px-3 py-2 whitespace-nowrap">
                            <a href="{{ route('posts.restore', $deletedPost->id) }}" class="inline-block rounded-sm border border-indigo-600 bg-green-600 px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:ring-3 focus:outline-hidden">Restore</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>
</tbody>
</table>

</body>
</html>