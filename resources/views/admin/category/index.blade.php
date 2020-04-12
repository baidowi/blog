@extends('template_backend.home')
@section('sub-judul','Kategori')
@section('content')

@if (Session::has('success'))
	<div class="alert alert-success" role="alert">
		{{ Session ('success') }}
	</div>	
@endif

<a href="{{ route('category.create') }}" class="btn btn-info btn-sm">Tambah Kategori</a><br><br> 

<table class="table table-striped table-bordered table-hover table-sm">
	<thead>	
		<tr>	
			<th>No	</th>
			<th>Name Kategori	</th>
			<th>Aksi	</th>
		</tr>
		<tbody>	
			@foreach ($category as $result => $hasil)
			<tr>
				<td> {{ $result + $category->firstitem() }}  </td>			
				<td> {{ $hasil->name }} </td>			
				<td>
				 
				<form action="{{ route('category.destroy',$hasil->id) }}" method="POST">
					@csrf
					@method('delete')
					<a href="{{ route('category.edit',$hasil->id) }}" class="btn btn-primary btn-sm">Edit</a> 
					<button type="submit" class="btn btn-danger btn-sm">Delete</button>
				</form>
				</td>			
				
			</tr>
			@endforeach
		</tbody>
	</thead>
</table>
{{ $category->links() }}

@endsection