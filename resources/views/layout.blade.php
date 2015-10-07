
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="{{url('favicon.ico')}}">

<title>@section('title') @show- 灵感 - 来自生活的馈赠</title>
<!-- Bootstrap core CSS -->
<link href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css"
	rel="stylesheet">

<!-- Custom styles for this template -->
<link href="{{asset('/css/blog.css')}}" rel="stylesheet">
<link rel="stylesheet"
	href="{{url('ckeditor/plugins/codesnippet/lib/highlight/styles/pojoaque.css')}}">


<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
<script src="{{asset('/js/ie-emulation-modes-warning.js')}}"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

	<nav class="navbar navbar-inverse" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed"
					data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{url('/')}}">LuBlog</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse"
				id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="active"><a class="blog-nav-item active"
						href="{{url('/')}}">首页</a></li>
					<li><a class="blog-nav-item"
						href="{{url('/search/categories?id=2')}}">PHP</a></li>
					<li><a class="blog-nav-item"
						href="{{url('/search/categories?id=3')}}">MYSQL</a></li>
					<li><a class="blog-nav-item"
						href="{{url('/search/categories?id=4')}}">个人随笔</a></li>
					<li><a class="blog-nav-item" href="{{url('/mboard')}}">留言板</a></li>
					<li><a class="blog-nav-item" href="{{url('/about')}}">关于</a></li>
				</ul>
				<form class="navbar-form navbar-right" role="search"
					action="/search.html" method="get">
					<div class="form-group">
						<input type="text" name="wd" class="form-control col-lg-4"
							placeholder="search" value="">
					</div>
					<button type="submit" class="btn btn-default">搜索</button>
				</form>

			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->
	</nav>

	<div class="container">

		<div class="blog-header">
			<h1 class="blog-title">LuBlog</h1>
			<p class="lead blog-description">蝼蚁虽小，也有梦想。</p>
		</div>

		<div class="row">

			<div class="col-sm-8 blog-main">@yield('content')</div>
			<!-- /.blog-main -->
			<div class="col-sm-3 col-sm-offset-1 blog-sidebar">
				@section('subject_des')
				<div class="sidebar-module sidebar-module-inset">
					<h4>联系博主</h4>
					<p>
						QQ：1055429046</br>Email:shouhuni.xue@gmail.com
					</p>
				</div>
				@show @include('archives') @include('elsewhere')
				@include('categories')

				<div class="sidebar-module">
					<a href="{{url('/admin/article')}}">=>登陆到后台</a>
				</div>
			</div>
			<!-- /.blog-sidebar -->

		</div>
		<!-- /.row -->

	</div>
	<!-- /.container -->

	<footer class="blog-footer">
		<p>
			<a href="http://www.miitbeian.gov.cn/">备案证书号：沪ICP备15044765号</a>

		</p>
		<p>
			<a href="#">Back to top</a>
		</p>
	</footer>


	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
	<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="{{asset('js/ie10-viewport-bug-workaround.js')}}"></script>
	<script
		src="{{url('ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js')}}"></script>

	<script>hljs.initHighlightingOnLoad();</script>

</body>
</html>
