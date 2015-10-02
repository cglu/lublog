 @extends('admin.admin') @section('title', '文章管理') @section('content')
<h1 class="page-header">文章管理</h1>
@if(session()->has('message'))
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert"
		aria-hidden="true">×</button>
	{{session('message')}}
</div>
@endif
<p>
	<a href="{{url('/admin/article/create')}}" class="btn btn-info"
		role="button">新建</a>
</p>
<table class="table table-striped">
	<thead>
		<tr>

			<th>标题</th>
			<th>评论</th>
			<th>浏览次数</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
		
		 
		
<?php
foreach ($articles as $article) {
    echo "<td><a href=\"".url('/article/'.$article->id)."\">{$article->title}</a>({$article->created_at})</td>
       <td>0</td>
       <td>0</td>
       <td><a href=\"#\" class=\"btn btn-info\" role=\"button\">编辑</a>
      <a href=\"#\" class=\"btn btn-info\" role=\"button\">删除</a></td></tr>";
}
?>
	</tbody>
</table>
<?php echo $articles->render(); ?>
@endsection
