<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isAdmin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role_id == 1 || Auth::user()->role_id == 4) {
            $articles = Article::all()->sortByDesc('created_at');
        } else {
            $articles = Article::where('user_id',Auth::user()->id)->get()->sortByDesc('created_at');
        }
        
        return view('articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create',[
            'users'=>User::all(),
        ]);   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title'=>'required|string|max:500',
            'content'=>'required'
        ]);
        $article = new Article();
        $article->title = $request->title;
        $article->content = $request->content;
        if (Auth::user()->role_id == 1 || Auth::user()->role_id == 4) {
            $article->user_id = $request->user_id;
        } else {
            $article->user_id = Auth::user()->id;
        }
        $article->save();

        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('articles.show',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $users = User::all();
        return view('articles.edit', compact('article','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $validate = $request->validate([
            'title'=>'required|string|max:500',
            'content'=>'required'
        ]);
        $article->title = $request->title;
        $article->content = $request->content;
        if (Auth::user()->role_id == 1 || Auth::user()->role_id == 4) {
            $article->user_id = $request->user_id;
        }
        $article->save();

        return redirect("/articles/".$article->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
    }
}
