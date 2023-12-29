<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::when(request()->has("keyword"),function($query){
            $query->where(function(Builder $builder){
                $keyword = request()->keyword;
            $builder->where('title','like',"%".$keyword."%");
            $builder->orWhere("description",'like',"%".$keyword."%");
            });
        })
        ->when(request()->has("orderby"),function($query){
            $sortType = request()->orderby;
            $query->orderBy("id","desc");
          
        })
        ->when(Auth::user()->role=== "user", function ($query){
            $query->where("user_id",Auth::id()); 
        })
         ->when(request()->has("title"),function($query){
            $sortType = request()->title ?? 'asc';
            $query->orderBy("title",$sortType);
        })
        ->paginate(7)->withQueryString();

        return view('article.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
       $article= Article::create([
            "title"=>$request->title,
            "slug"=> Str::slug($request->title),
            "description"=>$request->description,
            "except"=>  Str::words($request->description,30,"..."),
            "category_id"=> $request->category,
            "user_id"=> Auth::id()
        ]);

        return redirect()->route("article.index")->with("message",$article->title." is created");

    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('article.show',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('article.edit',compact('article'));   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        Gate::authorize('article-update',$article);

        $article->update([
            "title"=>$request->title,
            "slug"=> Str::slug($request->title),
            "description"=>$request->description,
            "except"=>  Str::words($request->description,30,"..."),
            "category_id"=> $request->category,
        ]);

        return redirect()->route("article.index")->with("message",$article->title." is updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {

        Gate::authorize('article-delete',$article);
        $title=$article->title;
        $article->delete();
        return redirect()->route("article.index")->with("message",$title." is deleted");
    }
}
