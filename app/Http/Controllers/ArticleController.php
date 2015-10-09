<?php
namespace lublog\Http\Controllers;

use lublog\Http\Requests;
use lublog\Http\Controllers\Controller;
use Illuminate\Http\Request;
use lublog\Article;
use lublog\Categories;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $articles = Article::with('categories')->orderBy('articles.created_at', 'desc')->paginate();
        
        return view('admin.article')->with('articles', $articles);
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories_list = Categories::get();
        return view('admin.create_article')->with('categories_list', $categories_list);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'content' => 'required'
        ]);
        $article = Article::create($request->only([
            'title',
            'description',
            'content',
            'category_id',
            'keywords'
        ]));
        if ($article) {
            $message = "添加文章成功";
        } else {
            $message = "添加文章失败";
        }
        return redirect('/admin/article')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id            
     * @return Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        if ($article) {
            return view('article_detailed')->with('article', $article);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id            
     * @return Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        $categories_list = Categories::get();
        return view('admin.edit_article')->with([
            'article' => $article,       
            'categories_list' => $categories_list
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id            
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'content' => 'required'
        ]);
        $article = Article::where('id', $id)->update($request->only([
            'title',
            'description',
            'content',
            'category_id',
            'keywords'
        ]));
        if ($article) {
            $message = "修改文章成功";
        } else {
            $message = "修改文章失败";
        }
        return redirect('/admin/article')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id            
     * @return Response
     */
    public function destroy($id)
    {
        if (Article::destroy($id)) {
            $message = "删除文章成功";
        } else {
            $message = "删除文章失败";
        }
        return redirect('/admin/article')->with('message', $message);
    }
}
