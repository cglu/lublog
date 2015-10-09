<?php
namespace lublog\Http\Controllers;

use lublog\Http\Requests;
use lublog\Http\Controllers\Controller;
use Illuminate\Http\Request;
use lublog\Article;

class SearchController extends Controller
{

    public function searchArticleByCategories(Request $request)
    {
        $id = $request->input('id');
        $articles = Article::where('category_id', '=', $id)->orderBy('articles.created_at', 'desc')->paginate();
        return view('welcome')->with([
            'articles' => $articles,
            'search_param'=>'&id='.$id
        ]);
    }
}
