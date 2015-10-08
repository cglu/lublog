<?php
namespace lublog\Http\Controllers;

use lublog\Http\Requests;
use lublog\Http\Controllers\Controller;
use Illuminate\Http\Request;
use lublog\Article;

class PageController extends Controller
{

    /**
     * 用于博客主页文章的显示
     */
    public function welcome()
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate(10);
        return view('welcome')->with('articles', $articles);
    }

    /**
     * 留言板
     */
    public function mboard()
    {
        $article = Article::where('title', '=', '留言板')->first();
        return view('article_detailed')->with('article', $article);
    }
    /**
     * 关于
     */
    public function about()
    {
        $article = Article::where('title', '=', '关于')->first();
        return view('article_detailed')->with('article', $article);
    }
    /**
     * rss
     */
    public function feed()
    {
        $rss = \RSS::make();
        if (! $rss->caching(10)) {
            
            // make channel.
            $rss->channel([
                'title' => 'LuBlog',
                'description' => '蝼蚁虽小，也有梦想。',
                'link' => url('/')
            ])->withImage([
                
                'url' =>asset('/images/avatar.jpg'),
                'title' => '头像',
                'link' => url('/')
            ]);
            $articles = Article::orderBy('created_at', 'desc')->take(20)->get();
            // gen posts data ......
            foreach ($articles as $article) {
                $rss->item([
                    'title' => $article->title,
                    'description|cdata' => $article->description,
                    'link' => url('/article/' . $article->id)
                ]);
            }
        }
        
        // If you want to save the rss data to file.
        // $rss->save('rss.xml');
        
        // Or just make a response to the http request.
        return \Response::make($rss->render(), 200, [
            'Content-Type' => 'text/xml'
        ]);
    }
}
