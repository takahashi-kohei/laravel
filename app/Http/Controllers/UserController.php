<?php

namespace App\Http\Controllers;

 use Illuminate\Http\Request;
use App\Http\Requests\StoreUser;
use App\User;

class UserController extends Controller
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
        //
        $users = User::paginate(5);
        return view('users.index',['users' => $users]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //urlがusers/createのとき
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUser
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser $request)
    {
        //urlがuserでpostされてとき(ユーザー作成後等)の処理
        //user作成後の遷移先は作成されたuserのページ
        $user = new User;
        // print_r($user);
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = $request->password;
        $user->save();

        //return redirect('users/'.$user->id);
        return redirect('users/'.$user->id)->with("my_status", __("Created new user."));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //そのユーザーが投稿した記事のうち、最新5件を取得
        $user->posts = $user->posts()->paginate(5);
        //urlが/users/{user}のとき※{user}＝ID
        return view("users.show", ["user"=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //editページへ遷移(idも必要)
        return view("users.edit",["user"=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // 実際の更新処理＆バリデーション
        
        // name欄だけを検査するため、元のStoreUserクラス内のバリデーション・ルールからname欄のルールだけを取り出す。
        $storeUser = new StoreUser();
        $request->validate([
            "name" => $storeUser->rules()["name"]
        ]);

        //putされてきたときに実行される
        $user->name = $request->name;
        $user->save();

        // 更新後は更新したユーザーのページへ遷移する
        //return redirect("users/".$user->id);
        return redirect('users/'.$user->id)->with("my_status", __("Updated a user."));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        //return redirect("users");
        return redirect('users')->with("my_status", __("Deleted a user."));
    }

    public function list()
    {
        return view('users.list');
    }
}
