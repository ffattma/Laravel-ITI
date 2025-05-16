<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(10); 
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $users = User::all();
        return view('posts.create', compact('users'));
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'required|string|max:255|unique:posts',
        'description' => 'required',
        'creator_id' => 'required|exists:users,id',
        'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048'
    ]);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('posts', 'public');
        $validatedData['image'] = $imagePath;
    }

    Post::create($validatedData);

    return redirect()->route('posts.index')->with('success', 'Post created successfully.');
}

    public function show(Post $post)
    {
        return view('posts.view', compact('post'));
    }

    public function edit(Post $post)
    {
        $users = User::all();
        return view('posts.edit', compact('post', 'users'));
    }

    public function update(Request $request, Post $post)
{
    $validatedData = $request->validate([
        'title' => 'required|string|max:255|unique:posts,title,' . $post->id,
        'description' => 'required',
        'creator_id' => 'required|exists:users,id',
        'image' => 'nullable|image|max:2048'
    ]);

    if ($request->hasFile('image')) {
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }
        $imagePath = $request->file('image')->store('posts', 'public');
        $validatedData['image'] = $imagePath;
    }

    $post->update($validatedData);

    return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
}

    public function destroy(Post $post)
{
    if ($post->image) {
        Storage::disk('public')->delete($post->image);
    }
    $post->delete();
    return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
}

    public function restore($id)
    {
        $post = Post::onlyTrashed()->findOrFail($id);
        $post->restore();
        return redirect()->route('posts.index')->with('success', 'Post restored successfully.');
    }
}
