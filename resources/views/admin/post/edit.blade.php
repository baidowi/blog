@extends('template_backend.home')
@section('sub-judul',' Edit Post')
@section('content')

@if (count($errors)>0)
@foreach($errors->all () as $error)
<div class="alert alert-danger" role="alert">
	{{ $error }}
</div>
@endforeach
@endif

@if (Session::has('success'))
<div class="alert alert-success" role="alert">
	{{ Session ('success') }}
</div>	
@endif


<form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">

	@csrf
	@method('PATCH')

	<div class="form-group">
		<label>Judul Post</label>
		<input type="text" class="form-control" name="judul" value="{{  $post->judul }}">
	</div>

	<div class="form-group">
		<label>Kategori</label>
		<select name="category_id" class="form-control" >
			<option value="" holder>Pilih kategori</option>
			@foreach ($category as $result)
			<option value="{{ $result->id }}"
			@if($result->id == $post->category_id)
			selected 
			@endif
				>{{ $result->name }}</option>

			@endforeach
		</select>
	</div>

	<div class="form-group">
		<label>Pilih Tag</label>
		<select class="form-control  select2" name='tags[]' multiple="">
			@foreach ($tags as $tag)
			<option value="{{ $tag->id  }}"
				@foreach($post->tags as $value)
				
				@if($tag->id == $value->id)
				selected 
				@endif
				@endforeach
		
				>{{ $tag->name }}</option>
			@endforeach
		</select>
	</div>

	<div class="form-group">
		<label>Kontent</label>
		<textarea name="content" class="form-control" >{{ $post->content }}</textarea>
	</div>

	<div class="form-group">
		<label>Thumbnail</label>
		<input type="file" class="form-control" name="gambar">
	</div>

	<div class="form-group">
		<button class="btn btn-primary btn-block"> Update Post</button>
	</div>

</form>
@endsection