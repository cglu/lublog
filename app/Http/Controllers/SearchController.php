<?php
namespace lublog\Http\Controllers;

use lublog\Http\Requests;
use lublog\Http\Controllers\Controller;
use Illuminate\Http\Request;
use lublog\Article;
use Illuminate\Support\Facades\Session;

class SearchController extends Controller
{

    public function searchArticleByCategories(Request $request)
    {
        $id = $request->input('id');
        $articles = Article::where('category_id', '=', $id)->orderBy('articles.created_at', 'desc')->paginate();
        return view('welcome')->with([
            'articles' => $articles,
           'search_data'=>['id'=>$id]
        ]);
    }
    public function searchArticleByDate(Request $request){
        $date = $request->input('date');
        $articles=Article::whereRaw('DATE_FORMAT(articles.created_at, "%Y-%m")=?',[$date])->orderBy('articles.created_at', 'desc')->paginate();
        return view('welcome')->with([
            'articles' => $articles,
            'search_data'=>['date'=>$date]
        ]);
    }
    public function searchAriticleByTitle(Request $request){
        $title=$request->input('title');
        Session::flash('search_title', $title);
        $articles=Article::whereRaw('title like ?',["%$title%"])->orderBy('created_at','desc')->paginate();
              return view('welcome')->with([
            'articles' => $articles,
            'search_data'=>['title'=>$title]
             
        ]);
        
    }
}
