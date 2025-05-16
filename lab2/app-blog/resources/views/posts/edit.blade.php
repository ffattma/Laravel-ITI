<form action="/posts/{{$post['id']}}" method="post">
    @csrf
    @method('put')
    Title: <input type="text" name="title" value="{{$post['title']}}"> </br>
    Body: <input type="text" name="body" value="{{$post['body']}}"> </br>
    <input type="submit" value="Update Post">

</form>
