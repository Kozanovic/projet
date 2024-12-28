<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // select * from posts;
        $postFromDB = Post::all();
        // dd($postFromDB);

        return view('posts.index', ['posts' => $postFromDB]);
    }

    public function show(Post $post)
    {
        // $singlePostFromDB = Post::find($id);
        // $singlePostFromDB = Post::findOrFail($id);
        // if (is_null($singlePostFromDB)){
        //     return to_route('posts.index');
        // }
        // $singlePostFromDB = Post::where('id' , $id)->first();
        // $singlePostFromDB = Post::where('id' , $id)->get();
        // dd($singlePostFromDB);
        // dd(Post::where('title' , 'react')->first());
        // dd(Post::where('title' , 'react')->get());
        return view('posts.show', ['post' => $post]);
    }
    public function create()
    {
        $users = User::all();
        return view('posts.create' , ['users'=> $users]);
    }
    public function store()
    {
        // $request = request();
        // dd($request->title , $request->all());
        // 1
        $data = request()->all();
        $post = Post::create($data);
        $post->title = $data['title'];
        $post->description = $data['description'];
        // 2
        // $title = request()->title;
        // $description = request()->description;
        // $postCreator = request()->post_creator;

        // $poste = new Post();
        // $poste->title = $title;
        // $poste->description = $description;
        // $poste->save();

        // dd($data , $title , $description , $postCreator);
        return to_route('posts.index');
    }
    public function edit(Post $post)	
    {
        $users = User::all();
        return view('posts.edit' , ['users'=> $users , 'post' => $post]);
    }
    public function update($id)
    {
        // $request = request();
        // dd($request->title , $request->all());
        $title = request()->title;
        $description = request()->description;
        $postCreator = request()->post_creator;

        $singlePostFromDB = Post::find($id);
        $singlePostFromDB->update([
            'title'=> $title,
            'description'=> $description,
            'user_id'=> $postCreator,
        ]);

        // dd($title , $description , $postCreator);
        return to_route('posts.show', $id);
    }
    public function destroy($id)
    {
        $post = Post::find($id);
        // dd($post); 
        $post->delete();
        // Post::where('id', $id)->delete();
        return to_route('posts.index');
    }
}
