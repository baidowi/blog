@extends('template_backend.home')
@section('sub-judul','Post')
@section('content')

@if (Session::has('success'))
	<div class="alert alert-success" role="alert">
		{{ Session ('success') }}
	</div>	
@endif

<a href="{{ route('post.create') }}" class="btn btn-info btn-sm">Tambah Post</a><br><br> 

<table class="table table-striped table-bordered table-hover table-sm">
	<thead>	
		<tr>	
			<th>No	</th>
			<th>Judul Post	</th>
			<th>Kategory	</th>
			<th>Tags	</th>
			<th>Gambar	</th>
			<th>Creator	</th>
			<th>Aksi	</th>
		</tr>
		<tbody>	
			@foreach ($post as $result => $hasil)
			<tr>
				<td> {{ $result + $post->firstitem() }}  </td>			
				<td> {{ $hasil->judul }} </td>			
				<td> {{ $hasil->category->name }} </td>	
				<td>
				 @foreach($hasil->tags as $tag)
				 <ul><span class="badge badge-info">	 {{ $tag->name }}</span></ul> 
				@endforeach
				</td>	
					
				<td> <img src="{{ asset( $hasil->gambar )}}" class="img-fluid" style="width: 100px;" alt="">  </td>
				<td> {{ $hasil->users->name }} </td>	

				<td>
				 
				<form action="{{ route('post.destroy',$hasil->id) }}" method="POST">
					@csrf
					@method('delete')
					<a href="{{ route('post.edit',$hasil->id) }}" class="btn btn-primary btn-sm">Edit</a> 
					<button type="submit" class="btn btn-danger btn-sm">Delete</button>
				</form>
				</td>			
				
			</tr>
			@endforeach
		</tbody>
	</thead>
</table>
{{ $post->links() }}

@endsection