<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('comments.index', [
            'comments' => Comment::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comments.create', [
            'posts' => Post::orderBy('title')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Comment::create([
            'username' => request('username'),
            'content' => request('content'),
            'post_id' => request('post_id'),
        ]);

        return redirect(route('comments.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        return view('comments.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        $posts = Post::orderBy('title')->get();
        return view('comments.edit', compact('comment','posts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        $comment->update([
            'username' => request('username'),
            'content' => request('content'),
            'post_id' => request('post_id'),
        ]);

        return redirect(route('comments.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect(route('comments.index'));
    }
}
