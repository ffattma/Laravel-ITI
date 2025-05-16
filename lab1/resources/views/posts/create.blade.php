<!DOCTYPE html>
<html lang="en">

<head>
    @vite('resources\css\app.css')
    <title>Document</title>
</head>

<body class="container m-auto">
    <form action="/posts" method="POST" class="mt-5 flex flex-col">
        @csrf
        <label for="title" class="mb-5">
            <span class="text-sm font-medium text-gray-700"> Title </span>
            <input type="text" id="title" class="mt-0.5 w-full rounded border-gray-300 shadow-sm sm:text-sm" />
        </label>

        <label for="body" class="mt-5">
            <span class="text-sm font-medium text-gray-700 mt-5"> Body </span>
            <input type="text" id="body" class="w-full rounded border-gray-300 shadow-sm sm:text-sm" />
        </label>

        <div>
            <input type="submit"
                class="self-start px-5 py-2 mt-5 bg-indigo-600 text-white rounded hover:bg-indigo-700" />
        </div>

    </form>
</body>

</html>
