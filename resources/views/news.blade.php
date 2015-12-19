<?php
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
?>


<div class="sidebar-module">
	<h4>最新IT新闻:</h4>
	<ol class="list-unstyled">
<?php
$url = "http://articles.csdn.net/api/rss.php?tid=1093";
Log::info("读取CSDN最新的IT新闻");
if (Cache::has('csdn:rss:1093')) {
   Log::info("缓存中发现数据，开始从缓存中读取数据.");
    $html = Cache::get('csdn:rss:1093');
} else {
    Log::info("缓存中未发现数据，开始发送HTTP请求。向csdn获取数据");
    $html = file_get_contents($url);
    $expires_at=Carbon::now()->addDay(1);
    Cache::put('csdn:rss:1093',$html,$expires_at);
}
$rss = simplexml_load_string($html);
$news = get_object_vars($rss->channel)['item'];
$keys = array_rand($news, 5);
foreach ($keys as $key) {
    $item = $news[$key];
    ?>
             <li><a target="_blank" href="<?php echo $item->link ?>"><?php echo $item->title; ?></a></li>
             <?php
}
?>
            </ol>
</div>