<?php
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

//过期时间=本月最后一天-当前时间
Log::info("归档....");
if (Cache::has('self:archive')) {
    Log::info("发现本月归档缓存,从缓冲读取归档数据。");
    $results=Cache::get('self:archive');
}else{
    Log::info("未发现本月归档数据,开始从DB中检索，并放入到缓存中..");
    $sql = 'select *,DATE_FORMAT(articles.created_at, "%Y-%m")as "create_date",
      COUNT(*) as "count" from articles GROUP BY create_date ;';
    $results = DB::select($sql);
    //获取当前时间戳
    $current_time=time();
    //获取本月是几月
    $month=date('m',$current_time);
    //获取今年是哪一年
    $year=date('Y',$current_time);
    //获取本月下一个月第一天的时间戳
    $next_month=mktime(0,0,0,$month+1,1,$year);
    //下个月第一天的时间戳-1=本月最后一天的时间戳
    $current_month_last_time=$next_month-60*60*24;
    //本月最后一个天的时间戳-当前时间戳＝缓存有效的秒数  此为被动失效的时间的计算方式，在文章发生增删改该缓存立马主动失效
    $expires_at=Carbon::now()->addSeconds($current_month_last_time-$current_time);
    Cache::put('self:archive',$results,$expires_at);
    
}
?>
<div class="sidebar-module">
	<h4>归档</h4>
	<ol class="list-unstyled">

		@foreach ($results as $record)
		<li><a href="{{url('/search/archive?date='.$record->create_date)}}">{{date('Y年m月',strtotime($record->create_date))}}({{$record->count}})</a></li>
		@endforeach
	</ol>
</div>