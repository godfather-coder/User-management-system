<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\PostFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('user')->with('postfile')->paginate(11);

        return view('pages.posts.index',[
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $valdata = $request->validated();
        $valdataforpostfile =  $request->validated();
        unset($valdata['imgs']);

        $postdata = $valdata;
        $postdata['user_id'] = auth()->id();

        Post::create($postdata);
        $post = DB::table('posts')->latest()->first();

        if(isset($valdataforpostfile['imgs'])){
            $valdataforpostfile['post_id'] = $post->id;
            unset($valdataforpostfile['description'],$valdataforpostfile['text']);
            $randstr = Str::random(6);
            $filename = $valdataforpostfile['imgs']->getClientOriginalName();
            $valdataforpostfile['imgs']->storeAs('PostFiles/',time().$randstr.$filename);
            $valdataforpostfile['path'] = '/PostFiles/'.time().$randstr.$filename;
            PostFile::create($valdataforpostfile);
        }
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('pages.posts.show',[
            'post'=>$post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)

    {
        if($post->user_id === auth()->id()){
            return view('pages.posts.edit',[
                        'post'=>$post,
                    ]);
        }
        return redirect()->back();

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        if($post->user_id==auth()->id()){
            Storage::disk('public')->delete($post->postfile[0]['path']);

            $valdata = $request->validated();
            $valdataforpostfile =  $request->validated();
            unset($valdata['imgs']);

            $postdata = $valdata;
            $postdata['user_id'] = auth()->id();

            if(isset($valdataforpostfile['imgs'])){
                $valdataforpostfile['post_id'] = $post->id;
                unset($valdataforpostfile['description'],$valdataforpostfile['text']);
                $randstr = Str::random(6);
                $filename = $valdataforpostfile['imgs']->getClientOriginalName();
                $valdataforpostfile['imgs']->storeAs('PostFiles/',time().$randstr.$filename);
                unset($valdataforpostfile['imgs']);
                $valdataforpostfile['path'] = '/PostFiles/'.time().$randstr.$filename;
                $post->postfile()->update($valdataforpostfile);
            }

            Post::find($post->id)->update($request->all());
        }
        return redirect()->route('posts.index')->with([
            'success' => 'Post data Updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if($post->user_id==auth()->id()){
            Storage::disk('public')->delete($post->postfile[0]['path']);
            $post->delete();
        }
        return redirect()->back();
    }
}
