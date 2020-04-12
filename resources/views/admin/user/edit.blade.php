@extends('template_backend.home')
@section('sub-judul',' Edit User')
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


<form action="{{ route('user.update', $user->id) }}" method="POST">

@csrf
@method('put')

	<div class="form-group">
		<label>Nama User</label>
		<input type="text" value="{{ $user->name }}" class="form-control" name="name">
	</div>

	<div class="form-group">
		<label>Emai</label>
		<input type="email" value="{{ $user->email }}" readonly class="form-control" name="email">
	</div>
	
	<div class="form-group">
		<label>Jenis User</label>
		<select name="tipe" class="form-control" >
			
			<option value="1" @if($user->tipe == 1) selected @endif holder>Administrator</option>
			<option value="0" @if($user->tipe == 0) selected @endif holder>Penulis</option>
		</select>
	</div>

	<div class="form-group">
		<label>Password</label>
		<input type="text" class="form-control" name="password">
	</div>

	<div class="form-group">
		<button class="btn btn-primary btn-block"> Update User</button>
	</div>

</form>
@endsection