<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Blogs;

class CommentController extends Controller
{

public function create(Blogs $blogs)
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Blogs $blogs,Request $request )
    {
        //  dd($request->input('uuid'));
      $comment= new Comment();
    //   $comment->blogs_id = $blogs->id;
    // $comment->user_id=auth()->id();
    // dd($comment->content);
      $comment->content=request()->get('content');
      $comment->save();
    //   dd($comment->content);
      return redirect()->route('blogs.index',$blogs->id)->with('success',"Comment posted!");
    //  return redirect()->route('blogs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($uuid)
    {
        $blog = Blogs::where('uuid', $uuid)->firstOrFail();

        // Get comments associated with the blog post
        $comments = $blog->comments()->orderBy('created_at', 'desc')->get();

        // Return a view with the blog and comments
        return view('blogs.show', compact('blog', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
