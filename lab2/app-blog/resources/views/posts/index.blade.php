<html>
  <head>
  @vite('resources/css/app.css')

  </head>
  <body>
  <a   class="inline-block rounded-sm border border-indigo-600 bg-indigo-600 px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:ring-3 focus:outline-hidden"
  href="/posts/create">Add New Post</a>

  <table class="min-w-full divide-y-2 divide-gray-200">
  <thead>
    <tr >
      <th class="px-3 py-2 whitespace-nowrap">id</th>
      <th class="px-3 py-2 whitespace-nowrap">Title</th>
      <th class="px-3 py-2 whitespace-nowrap" >Body</th>
      <th class="px-3 py-2 whitespace-nowrap">Created_by</th>
    </tr>
  </thead>
  <tbody>


@foreach($posts as $post)
  <tr class="*:text-gray-900 *:first:font-medium">
    <td class="px-3 py-2 whitespace-nowrap">{{$post['id']}}</td>
    <td class="px-3 py-2 whitespace-nowrap">{{$post['title']}}</td>
    <td class="px-3 py-2 whitespace-nowrap">{{$post['body']}}</td>
    <td class="px-3 py-2 whitespace-nowrap">{{$post['created_by']}}</td>

    <td>
    <a
        class="inline-block rounded-sm border border-indigo-600 bg-indigo-600 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:ring-3 focus:outline-hidden"
        href="{{ route('posts.show', $post['id']) }}"
    >
        View
    </a>
</td>

    <td> <a class="inline-block rounded-sm border border-yellow-600 bg-yellow-600 px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-yellow-600 focus:ring-3 focus:outline-hidden" href="/posts/{{$post['id']}}/edit">Edit</a> </td>

    <td> <form action="/posts/{{$post['id']}}" method="post">
        @csrf
        @method('delete')
        <input type="submit" value=" Delete" class="inline-block rounded-sm border border-red-600 bg-red-600 px-12 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-red-600 focus:ring-3 focus:outline-hidden"/>
    </form> </td>


</tr>
@endforeach

</body>

</html>


