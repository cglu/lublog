<?php
namespace lublog\Http\Controllers;

use lublog\Http\Requests;
use lublog\Http\Controllers\Controller;
use Illuminate\Http\Request;
use lublog\Article;
use Illuminate\Support\Facades\Redis;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class PageController extends Controller
{

    /**
     * 用于博客主页文章的显示
     */
    public function welcome()
    {
        if (Cache::has('welcome.articles')) {
            Log::info("从缓存中取得数据.");
            $articles = Cache::get('welcome.articles');
        } else {
            Log::info("缓存中没有数据，从数据取得数据，并放入缓存中.");
            $articles = Article::orderBy('created_at', 'desc')->paginate();
            $expiresAt = Carbon::now()->addMinute(30);
            Cache::put('welcome.articles', $articles, $expiresAt);
        } 
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
                
                'url' => asset('/images/avatar.jpg'),
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
