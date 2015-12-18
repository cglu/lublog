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

<?php  if(isset($search_data)){echo $articles->appends($search_data)->render();}else{echo $articles->render();}?>
@endsection

