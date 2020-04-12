@extends('template_backend.home')
@section('sub-judul',' Edit Tag')
@section('content')

@if (count($errors)>0)
	@foreach($errors->all () as $error)
		<div class="alert alert-danger" role="alert">
		{{ $error }}
		</div>
	@endforeach
@endif



<form action="{{ route('tag.update', $tag->id) }}" method="POST">

@csrf
@method('patch')

	<div class="form-group">
		<label>Nama Tag</label>
		<input type="text" class="form-control" value="{{ $tag->name }}" name="name">
	</div>

	<div class="form-group">
		<button class="btn btn-primary btn-block"> Update Tag</button>
	</div>

</form>
@endsection