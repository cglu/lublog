 @extends('layout') 
  @section('title'){{$article->title}}@endsection
  @section('keywords'){{$article->keywords}}@endsection
  @section('description')<?php
echo $article->description;
?>@endsection
 @section('content')
<div class="blog-post">
	<h2 class="blog-post-title">
		<a href="#"> <strong>{{$article->title}}</strong>
		</a>
	</h2>
	<p class="blog-post-meta">
		{{date('Y-m-d',strtotime($article->created_at))}} <a
			href="{{url('/search/categories?id='.$article->category_id)}}">{{$article->categories->name}}</a>
	</p>
	{!! $article->content !!}
</div>
<hr>
<div class="ds-share" data-thread-key="" 
	data-title="{{$article->title}}"
	data-images="{{asset('/images/avatar.jpg')}}"
	data-content="{{$article->content}}"
	data-url="{{url('/article/'.$article->id)}}">
	<div class="ds-share-inline">
		<ul class="ds-share-icons-16">

			<li data-toggle="ds-share-icons-more"><a class="ds-more"
				href="javascript:void(0);">分享到：</a></li>
			<li><a class="ds-weibo" href="javascript:void(0);"
				data-service="weibo">微博</a></li>
			<li><a class="ds-qzone" href="javascript:void(0);"
				data-service="qzone">QQ空间</a></li>
			<li><a class="ds-qqt" href="javascript:void(0);" data-service="qqt">腾讯微博</a></li>
			<li><a class="ds-wechat" href="javascript:void(0);"
				data-service="wechat">微信</a></li>

		</ul>
		<div class="ds-share-icons-more"></div>
	</div>
</div>
<!-- 多说评论框 start -->
<div class="ds-thread" data-thread-key="{{$article->id}}"
	data-title="{{$article->title}}"
	data-url="{{url('/article/'.$article->id)}}"></div>
<!-- 多说评论框 end -->
<!-- 多说公共JS代码 start (一个网页只需插入一次) -->
<script type="text/javascript">
var duoshuoQuery = {short_name:"lublog"};
	(function() {
		var ds = document.createElement('script');
		ds.type = 'text/javascript';ds.async = true;
		ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
		ds.charset = 'UTF-8';
		(document.getElementsByTagName('head')[0] 
		 || document.getElementsByTagName('body')[0]).appendChild(ds);
	})();
	</script>
<!-- 多说公共JS代码 end -->

<style>
.ds-powered-by {
	/* display: block!important; */
	text-align: right !important;
	display: none !important;
}

 

</style>
@endsection
