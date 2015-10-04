 @extends('layout') @section('content') @section('title') {{$article->title}} @endsection
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
<!--高速版-->
<div id="SOHUCS" sid="{{$article->id}}"></div>
<script charset="utf-8" type="text/javascript" src="http://changyan.sohu.com/upload/changyan.js" ></script>
<script type="text/javascript">
    window.changyan.api.config({
        appid: 'cys1AAXeS',
        conf: 'prod_ffb58d659957774812f5ebcc9649a8c8'
    });
</script>       
<style>
#SOHUCS #SOHU_MAIN #powerby_sohu, #SOHUCS #SOHU_MAIN #powerby_sohu .section-service-w, #SOHUCS #SOHU_MAIN #powerby_sohu .section-service-w .service-wrap-w, #SOHUCS #SOHU_MAIN #powerby_sohu .section-service-w .service-wrap-w a {
	/* display: block!important; */
	text-align: right !important;
	display: none !important;
}
 </style>
@endsection