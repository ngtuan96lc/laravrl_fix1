@extends('layouts.main')
@section('title',$tag->name)
@section('content')
<section class="posts-list">
	<h3>Tag: {{ $tag->name }} <a href="/admin/posts/create" class="btn btn-primary float-right"><i class="fa fa-plus" aria-hidden="true"></i> Create</a></h3>
	<div class="table-wrapper">
		<table class="alt">
			<thead>
				<tr>
					<th>#</th>
					<th>Title</th>
					<th>Tag</th>
				</tr>
			</thead>
			<tbody>
				@foreach($tag->Posts as $post)
				<tr>
					<td>{{ $post->id }}</td>
					<td>{{ $post->title }}</td>
					<td>
					@foreach($post->Tags as $pTag)
						@if($pTag->id != $tag->id)
							<a href="{{ route('tags.show',['tag' => $pTag->id]) }}" class="badge badge-secondary">{{ $pTag->name }}</a>
						@else
							<span class="badge badge-primary">{{ $pTag->name }}</span>
						@endif
					@endforeach
					</td>
					<td><form action="{{ route('posts.destroy',['post' => $post->id]) }}" method="POST">
						{{ csrf_field() }}
						<input type="hidden" name="_method" value="DELETE">
						<a href="{{ route('posts.edit',['post' => $post->id]) }}" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a> <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button></form></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</section>
@endsection