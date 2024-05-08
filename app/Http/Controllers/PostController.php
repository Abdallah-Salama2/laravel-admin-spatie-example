<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts=Post::orderBy("id","DESC")->get();
        return view('dashboard',compact('posts'));
    }


    public function About()
    {
        //
        return view('about');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
//        dd($request);

        Post::create([
            'title'=>$request->title,
        ]);
        return redirect(route('dashboard'))
            ->with('message', 'Post has successfully been created.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
//    public function edit(Request $request, $postId)
//    {
//        // Fetch the post using the provided ID
//        dd($postId);
//        $post = Post::findOrFail($postId);
//
//        // Update the post's title
//        $post->title = $request->title;
//        $post->save();
//
//        return redirect(route('dashboard'))->with('message', 'Post has successfully been updated.');
//    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // Validate the incoming request
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        // Update the post's title
        $post->update([
            'title' => $request->title,
        ]);

        return redirect(route('dashboard'))->with('message', 'Post has successfully been updated.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
        $post->delete();
        return redirect(route('dashboard'))->with('message', 'Post has successfully been deleted.');

    }
}
