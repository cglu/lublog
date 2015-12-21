    <?php
    use Illuminate\Support\Facades\DB;
    use Carbon\Carbon;
    use Illuminate\Support\Facades\Log;
    use Illuminate\Support\Facades\Cache;
    
    Log::info("分类....");
    if (Cache::has('self::categorie')) {
        Log::info("在缓存中发现分类信息...开始从缓存中读取数据");
        $results = Cache::get('self::categorie');
    } else {
        Log::info("没有在缓存中发现分类信息，开始查询DB获取信息，并放入到缓存中.");
        $sql = "select COUNT(*) as 'count',categories.`name`,categories.id from categories
            left JOIN articles on articles.category_id=categories.id
            where articles.title is not null and articles.title!=''
            GROUP BY categories.id,categories.`name` ;";
        $results = DB::select($sql);
        $expires_at=Carbon::now()->addMinutes(30);
        Cache::put('self::categorie',$results,$expires_at);
    }
  
        ?>
<div class="sidebar-module">
	<h4>分类</h4>
	<ol class="list-unstyled">
          <?php
          foreach ($results as $record) {
        echo "<li><a href=\"" . url("/search/categories?id={$record->id}") . "\">{$record->name}({$record->count})</a></li>";
    }
    ?>
            </ol>
</div>