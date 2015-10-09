<?php
use Illuminate\Support\Facades\DB;
$sql = 'select *,DATE_FORMAT(articles.created_at, "%Y-%m")as "create_date",
      COUNT(*) as "count" from articles GROUP BY create_date ;';
$results = DB::select($sql);
?>
<div class="sidebar-module">
	<h4>归档</h4>
	<ol class="list-unstyled">

		@foreach ($results as $record)
		<li><a href="{{url('/search/archive?date='.$record->create_date)}}">{{date('Y年m月',strtotime($record->create_date))}}({{$record->count}})</a></li>
		@endforeach
	</ol>
</div>