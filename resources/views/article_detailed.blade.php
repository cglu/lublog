 @extends('layout') @section('content')
<div class="blog-post">
	<h2 class="blog-post-title">
		<a href="#"> <strong>{{$article->title}}</strong>
		</a>
	</h2>
	<p class="blog-post-meta">
		{{date('Y-m-d',strtotime($article->created_at))}} <a href="#">Mark</a>
	</p>
	{!! $article->content !!}
</div>
<hr>
评论区域、暂未实现 @endsection
