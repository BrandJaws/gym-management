<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Posts;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::orderBy('posts.created_at', 'desc')->get();
        return  view('pages.posts')->with('posts',$posts);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('pages.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'bail|required|unique:posts|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:500',
            'body' => 'required',
        ]);
        $path = $request->file('image')->store('public');
        $url = Storage::url($path);
        $post = new Posts();
        $post->fill($request->only([
            'name',
            'body'
        ]));
        $post->image = $url;
        $post->save();
        return redirect(route('post.page'))->with('message', 'Post has been created!');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Posts::find($id);
        return View('pages.show')->with('posts', $posts);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Posts::find($id);
        return View('pages.edit')->with('posts', $post);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Posts::find($id);
        $path = $request->file('image')->store('public');
        $url = Storage::url($path);
        $post->fill($request->only([
            'name',
            'body'
        ]));
        $post->image = $url;
        $post->save();
        return redirect(route('post.page'))->with('message', 'Post has been updated!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Posts::find($id);
        $post->delete();
        return redirect(route('post.page'))->with('message', 'Post has been deleted!');
    }
}



