<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){ 
        $posts = Post::paginate(5); 
        return view('index', ['posts' => $posts]); 
    }

    public function search(Request $request){ 
        $posts = Post::where('autor', $request->autor)->paginate(5); 
        return view('index', ['posts' => $posts]); 
    }

    public function create()
    {
        return view('create');
    }
   
    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $post = new Post();
        $post->titulo = $request->titulo;
        $post->contenido = $request->contenido;
        $post->autor = $request->autor;
        $post->save();
        return redirect()->route('posts.index');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $post = Post::find($id);
        return view('show', ['post' => $post]); 
    }

     /**
     * Update the specified resource in storage.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $posts = Post::find($id);
        $posts->delete();
        return redirect()->route('posts.index');

    }
}
