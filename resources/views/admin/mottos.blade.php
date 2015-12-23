@extends('admin.admin') @section('title', '博客签名') @section('content')
<h1 class="page-header">博客签名</h1>
@if(session()->has('message'))
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert"
		aria-hidden="true">×</button>
	{{session('message')}}
</div>
@endif
<div class="row">
<form class="navbar-left col-xs-12" role="search"
	action="{{url('admin/motto')}}" method="post">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="form-group ">
		<input type="text" name="name" class="form-control "
			placeholder="新的签名" value="">

	</div>
	<div class="form-group " >
	<button type="submit" class="btn btn-default " >添加</button>

	</div>
	
	<span id="helpBlock" class="help-block"><?php echo $errors->first('name');?></span>
</form>
</div>
<table class="table table-striped">
	<thead>
		<tr>

			<th>签名</th>
			<th>操作</th>
		</tr>
		<?php  foreach ($mottos as $motto) {
    echo "<tr>
		     <td style=\"width:80%;\">{$motto}</td>
		      <td><a href=\"" . url("/admin/motto/del/{$motto}") . "\" class=\"btn btn-info\" role=\"button\">删除</a></td>
		     </tr>";
}
?>
	</thead>
	<tbody>
	@endsection