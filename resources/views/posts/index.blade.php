@extends('layouts.main')
@section('title','List posts')
@section('content')
<section class="posts-list">
	<h3>List Posts <a href="/admin/posts/create" class="btn btn-primary float-right"><i class="fa fa-plus" aria-hidden="true"></i> Create</a></h3>
	<div class="table-wrapper">
		<table class="alt">
			<thead>
				<tr>
					<th>#</th>
					<th>Title</th>
					<th>Create at</th>
				</tr>
			</thead>
			<tbody>
				@foreach($posts as $post)
				<tr>
					<td>{{ $loop->index+1 }}</td>
					<td>{{ $post->title }}</td>
					<td>{{ $post->created_at }}</td>
					<td><form action="{{ route('posts.destroy',['post' => $post->id]) }}" method="POST">
						{{ csrf_field() }}
						<input type="hidden" name="_method" value="DELETE">
						<a href="{{ route('posts.edit',['post' => $post->id]) }}" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a> <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button></form></td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{!! $posts->links() !!}
	</div>
</section>
@endsection