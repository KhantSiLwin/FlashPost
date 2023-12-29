<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class PageController extends Controller
{
    
    public function index(){
        $articles = Article::when(request()->has("keyword"),function($query){
            $keyword = request()->keyword;
            $query->where('title','like',"%".$keyword."%");
            $query->orWhere("description",'like',"%".$keyword."%");
       
          })
          ->when(request()->has("orderby"),function($query){
            $sortType = request()->orderby;
            $query->orderBy("id",$sortType);
          
        })
          ->when(request()->has('category'),function($query){
            $query->where("category_id",request()->category);
          })
         ->when(request()->has("title"),function($query){
            $sortType = request()->title ?? 'asc';
            $query->orderBy("title",$sortType);
        })
        ->latest("id")
        ->paginate(7)->withQueryString();
    
        return view('welcome',compact('articles'));
    }

    public function show($slug){

        $article = Article::where('slug',$slug)->first();
        return view('detail',compact('article'));
    }

    public function categorized($slug){
      
        $category = Category::where('slug',$slug)->first();
       
        return view('categorized',[
            "category"=>$category,
            "articles"=>$category->articles()->paginate(7)
        ]);
       
    }

    // ->when(request()->has("keyword"),function($query){
    //     $keyword = request()->keyword;
    //     $query->where('title','like',"%".$keyword."%");
    //     $query->orWhere("description",'like',"%".$keyword."%");
   
    //   })->paginate(10)->withQueryString()
}
