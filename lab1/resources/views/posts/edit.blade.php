<!DOCTYPE html>
<html lang="en">

<head>
    @vite("resources\css\app.css")

    <title>Document</title>
</head>

<body class="container m-auto ">
    <form action="/posts" method="POST">
        <a href="#" class="block rounded-md border border-gray-300 p-4 shadow-sm sm:p-6 mt-5">

            <div class="sm:flex sm:justify-between sm:gap-4 lg:gap-6">
                <div class="sm:order-last sm:shrink-0">
                    <img alt=""
                        src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1180&q=80"
                        class="size-16 rounded-full object-cover sm:size-[72px]" />
                </div>

                <div class="mt-4 sm:mt-0">
                    <h3 class="text-lg font-medium text-pretty text-gray-900">
                        {{ $post['title'] }}
                    </h3>

                    <p class="mt-1 text-sm text-gray-700">{{ $post['created_by'] }}</p>

                    <p class="mt-4 line-clamp-2 text-sm text-pretty text-gray-700">
                        {{ $post['body'] }}
                    </p>
                </div>
            </div>



            <div>
                <input type="submit"
                    class="self-start px-5 py-2 mt-5 bg-indigo-600 text-white rounded hover:bg-indigo-700" />
            </div>
            </dl>
        </a>
    </form>

</body>

</html>
