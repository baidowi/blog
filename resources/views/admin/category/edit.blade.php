@extends('template_backend.home')
@section('sub-judul',' Edit Kategori')
@section('content')

@if (count($errors)>0)
	@foreach($errors->all () as $error)
		<div class="alert alert-danger" role="alert">
		{{ $error }}
		</div>
	@endforeach
@endif



<form action="{{ route('category.update', $category->id) }}" method="POST">

@csrf
@method('patch')

	<div class="form-group">
		<label>Nama Kategori</label>
		<input type="text" class="form-control" value="{{ $category->name }}" name="name">
	</div>

	<div class="form-group">
		<button class="btn btn-primary btn-block"> Update Kategory</button>
	</div>

</form>
@endsection