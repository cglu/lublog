  @extends('layout')
@section('content')		 
<?php
foreach ($articles as $article) {
    ?>
<div class="blog-post">
	<h2 class="blog-post-title">
		<a href="{{url('article/'.$article->id)}}"> <strong>{{$article->title}}</strong>
		</a>
	</h2>
	<p class="blog-post-meta">
		{{date('Y-m-d',strtotime($article->created_at))}} <a
			href="{{url('/search/categories?id='.$article->category_id)}}">{{$article->categories->name}}</a>
	</p>
					
					<?php
    $body = $article->content;
    $summary = lublog\Lublog\ArticleProcess::getSummary($body);
    echo $summary;
    ?> 
   <p class="read-article">
		<a href="{{url('article/'.$article->id)}}">点击阅读全文</a>
	</p>
</div>
<hr />
<!-- /.blog-post -->
<?php
}
?>
<nav>
	<ul class="pager">
		<li><a //这部分以后通过重写Laravel分页模版实现
			href="<?php
$url = "";
if ($articles->currentPage() == 1) {
    
    $url = $articles->url($articles->lastPage());
} else {
    $prevPage = $articles->currentPage() - 1;
    $url = $articles->url($prevPage);
}
if (isset($search_param)) {
    $url .= $search_param;
}
echo $url;
?>">Previous</a></li>


		<li><a
			href="<?php
$url = "";
if ($articles->currentPage() == $articles->lastPage()) {
    $url = $articles->url(1);
} else {
    
    $url = $articles->nextPageUrl();
}
if (isset($search_param)) {
    $url .= $search_param;
}
echo $url;
?>">Next</a></li>
	</ul>
</nav>
@endsection

