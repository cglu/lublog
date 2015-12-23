 @extends('admin.admin') @section('title', '分类管理') @section('content')
<h1 class="page-header">分类管理</h1>
@if(session()->has('message'))
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert"
		aria-hidden="true">×</button>
	{{session('message')}}
</div>
@endif
<div class="row">
<form class=" navbar-left col-xs-12" role="search"
	action="{{url('admin/categories')}}" method="post">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="form-group">
		<input type="text" name="name" class="form-control col-lg-4"
			placeholder="新的分类" value="">

	</div>
	<button type="submit" class="btn btn-default">添加</button>
	<span id="helpBlock" class="help-block"><?php echo $errors->first('name');?></span>
</form>
</div>
<table class="table table-striped">
	<thead>
		<tr>

			<th>分类名</th>
			<th>操作</th>
		</tr>
		<?php
foreach ($categories_list as $categories) {
    echo "<tr>
		     <td style=\"width:80%;\">{$categories->name}</td>
		      <td><a href=\"" . url("/admin/categories/del/{$categories->id}") . "\" class=\"btn btn-info\" role=\"button\">删除</a></td>
		     </tr>";
}
?>
	</thead>
	<tbody>@endsection