<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Requests\StorePost;
use App\Models\Post;

class PostController extends Controller
{

    /**
     * 各アクションの前に実行させるミドルウェア
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 1. 新しい順に取得できない
        // $posts = Post::all();

        // 2. 記述が長くなる
        // $posts = Post::orderByDesc('created_at')->get();

        // 3. latestメソッドがおすすめ(新しい順に取得可能)
        $posts = Post::latest()->paginate(5);

        //$user = Post::find(1)->user;
        foreach ($posts as $a) {
            //\Debugbar::info($a);
            //\Debugbar::info($a->user);
        }


        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests/StorePost  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request)
    {
        //urlがpostsでpostされてとき(ユーザー作成後等)の処理
        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = $request->user()->id;
        $post->save();

        //return redirect('posts/'.$post->id);
        return redirect('posts/'.$post->id)->with("my_status", __("Posted new article."));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', ["post" => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view("posts.edit",["post"=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests/StorePost  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(StorePost $request, Post $post)
    {
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        //return redirect("posts/".$post->id);
        return redirect('posts/'.$post->id)->with("my_status", __("Updated an article."));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        //return redirect("posts");
        return redirect('posts')->with("my_status", __("Deleted an article."));
    }
}
