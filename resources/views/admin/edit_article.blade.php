 @extends('admin.admin') @section('title', '编辑文章') @section('content')
<h1 class="page-header">编辑文章</h1>
<form action="{{url('/admin/article/'.$article->id)}}" method="post">
  <input type="hidden" name="_method" value="PUT">
	<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
	<div class="form-group">
		<label for="exampleInputEmail1">标题</label> <input type="text"
			class="form-control" name="title" placeholder=""
			value="{{old('title',$article->title)}}"> <span id="helpBlock"
			class="help-block"><?php echo $errors->first('title');?></span>
	</div>
	<div class="form-group">
		<label for="exampleInputPassword1">描述</label> <input type="text"
			class="form-control" placeholder="" name="description"
			value="{{old('description',$article->description)}}"> <span
			id="helpBlock" class="help-block"><?php echo $errors->first('description');?></span>
	</div>
	<div class="form-group">
		<label for="exampleInputPassword1">文章文类</label> <select
			class="form-control" name="category_id">
	<?php
foreach ($categories_list as $categories) {
    echo "<option value=\"{$categories->id}\"".
     (old('category_id',$article->category_id)==$categories->id?"selected='1'":"")
    .">{$categories->name}</option>";
}
?>
   
</select> <span id="helpBlock" class="help-block"><?php echo $errors->first('category_id');?></span>
	</div>
	<div class="form-group">
		<label for="exampleInputPassword1">内容</label>
		<textarea id="content" cols="20" rows="2" class="ckeditor"
			name="content"> {{old('content',$article->content)}}</textarea>
		<span id="helpBlock" class="help-block"><?php echo $errors->first('content');?></span>

	</div>
	<button type="submit" class="btn btn-default">Submit</button>
</form>
@endsection @section('js_resources')
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
    CKEDITOR.replace('content');
   
</script>
@endsection
