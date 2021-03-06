<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
	    return view('posts.create');
    }

    public function store(Request $request)
    {
		//return $request->all();

	    //return $request->title;   //Allowed - Using tag name as property
        //return $request->get('title'); //return $request->get('name');

	    //Method 1 - Storing to Database
	    Post::create($request->all());

	    //Method 2 - Storing to Database
	    //$input = $request->all();
	    //$input['title'] = $request->title;
	    //Post::create($request->all());

	    //Method 3 - Storing to Database
	    //$post = new Post;
	    //$post->title = $request->title;
	    //$post->save();
		return redirect('/posts');
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function edit($id)
    {
	    $post = Post::findOrFail($id);
	    return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->update($request->all());
		return redirect('/posts');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
              //Post::whereId($id)->delete();
	          //Post::where('id', $id)->delete();
        $post->delete();
        return redirect('/posts');
    }
}
