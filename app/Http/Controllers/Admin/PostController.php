<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = auth()->user()->posts()->latest()->paginate(5);

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request, Post $post)
    {
        $active = $request->has('active') ? 1 : 0;

        $post = auth()->user()->posts()->create($request->validated() + ['active' => $active]);

        return to_route('admin.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $active = $request->has('active') ? 1 : 0;
        $post->update($request->validated() + ['active' => $active]);

        return to_route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return to_route('admin.posts.index');
    }
}
