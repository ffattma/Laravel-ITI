<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources\css\app.css')
    <title>Document</title>
</head>

<body class=" min-h-screen container mx-auto px-4 mt-5">

    <a href="/posts/create" class="inline-block rounded-sm border border-blue-400 bg-blue-400 px-3 py-1 text-sm font-medium text-white hover:bg-transparent hover:text-blue-400
    focus:ring-3 focus:outline-hidden m-3">Add new post</a>

    <table class=" min-w-full divide-y-2 divide-gray-200 border border-gray-300 shadow-sm text-center mx-auto">
        <thead class="text-center">
            <tr class="*:font-medium *:text-gray-900">
                <th class="px-3 py-2 whitespace-nowrap">Id</th>
                <th class="px-3 py-2 whitespace-nowrap">Title</th>
                <th class="px-3 py-2 whitespace-nowrap">Last</th>
                <th class="px-3 py-2 whitespace-nowrap">Created by</th>
                <th class="px-3 py-2 whitespace-nowrap">View</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 *:even:bg-gray-50">
            @foreach ($posts as $post)
                <tr class="*:text-gray-900 *:first:font-medium">
                    <td class="px-3 py-2 whitespace-nowrap">{{ $post['id'] }}</td>
                    <td class="px-3 py-2 whitespace-nowrap">{{ $post['title'] }}</td>
                    <td class="px-3 py-2 whitespace-nowrap">{{ $post['body'] }}</td>
                    <td class="px-3 py-2 whitespace-nowrap">{{ $post['created_by'] }}</td>

                    <td>
                        <a class="inline-flex items-center gap-2 rounded-sm border border-indigo-600 bg-indigo-600 px-1 py-1 text-white hover:bg-transparent hover:text-indigo-600 focus:ring-3 focus:outline-hidden m-3"
                            href="/posts/{{ $post['id'] }}">
                            <span class="text-sm font-medium"> View </span>

                            <svg class="size-5 shadow-sm rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>

                        <a href="/posts/{{ $post['id'] }}/edit" class="inline-block rounded-sm border border-yellow-400 bg-yellow-400 px-3 py-1 text-sm font-medium text-white hover:bg-transparent hover:text-yellow-400
                                    focus:ring-3 focus:outline-hidden m-3">Edit</a>

                        <a href="/posts/{{ $post['id'] }}/delete" class="inline-block rounded-sm border border-red-600 bg-red-600 px-1 py-1 text-sm font-medium text-white
                                 hover:bg-transparent hover:text-red-600 focus:ring-3 focus:outline-hidden m-3">Delete</a>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
