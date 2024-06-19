<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Models\Blogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
     {
        $blogs=Blogs::orderBy('created_at','DESC');

        // if(request()->has('search')){
        //     $blog=$blog->where()
        // }
    //     // $blogs=Blogs::where('user_id',Auth::id())->latest('updated_at')->get();
    //     $blogs=Blogs::where('user_id',Auth::id())->latest('updated_at')->paginate(10);

        //  return view('blogs.index')->with('blogs',$blogs);
        return view('blogs.index',[
            'blogs'=>blogs::orderBy('created_at','DESC')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|max:120',
            'text'=>'required'
        ]);

        // $blog=new Blogs([
        //     'user_id'=>Auth::id(),
        //     'title'=>$request->title,
        //     'text'=>$request->text
        // ]);
        // $blog->save();

        Blogs::create([
            'uuid'=>Str::uuid(),
            'user_id'=>Auth::id(),
            'title'=>$request->title,
            'text'=>$request->text
        ]);
        return to_route('blogs.index');

    }

    /**
     * Display the specified resource.
     */
    public function show($uuid)
    {
        // if($blogs->user_id !=Auth::id()){
        //     return abort(403);
        // }
         $blogs=Blogs::where('uuid',$uuid)->where('user_id',Auth::id())->firstOrFail();
        //  dd($blogs->comments);
        $comments = $blogs->comments;
         return view ('blogs.show')->with('blog',$blogs);
        // return view('blogs.show', compact('blogs', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($uuid)
    {
        // if(!$blogs->user_id !=Auth::id()){
        //     return abort(403);
        // }
        $blogs=Blogs::where('uuid',$uuid)->where('user_id',Auth::id())->firstOrFail();
        return view ('blogs.edit')->with('blog',$blogs);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $uuid)
    {
        // if($blogs->user_id !=Auth::id()){
        //     return abort(403);
        // }
        $blogs=Blogs::where('uuid',$uuid)->where('user_id',Auth::id())->firstOrFail();

        $request->validate([
            'title'=>'required|max:120',
            'text'=>'required'
        ]);
        $blogs->update([
            'title'=> $request->title,
            'text'=> $request->text
        ]);

        return to_route('blogs.show',$blogs);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($uuid)
    {
        $blogs=Blogs::where('uuid',$uuid)->where('user_id',Auth::id())->firstOrFail();
        $blogs->delete();
         return to_route('blogs.index');
    }
}
