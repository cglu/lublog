 @extends('admin.admin') @section('title', '添加文章') @section('content')
<h1 class="page-header">添加文章</h1>
<form action="{{url('/admin/article')}}" method="post">
<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
	<div class="form-group">
		<label for="exampleInputEmail1">标题</label> <input type="text"
			class="form-control" name="title" placeholder="">
	</div>
	<div class="form-group">
		<label for="exampleInputPassword1">描述</label> <input type="text"
			class="form-control" placeholder="" name="display">
	</div>
	<div class="form-group">
		<label for="exampleInputPassword1">内容</label>
		<textarea id="content" cols="20" rows="2" class="ckeditor"
			name="content"></textarea>
	</div>
	<button type="submit" class="btn btn-default">Submit</button>
</form>
@endsection @section('js_resources')
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
    CKEDITOR.replace('content');
   
</script>
@endsection
