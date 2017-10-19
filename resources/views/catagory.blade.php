@extends('layouts.main')
@section('title',$catagory->name)
@section('content')
@if(!empty($posts))
	<!-- Posts -->
	<section class="posts">
		@foreach($catagory->Post as $post)
			<article>
				<header>
					<span class="date">{{ date('M d, Y',strtotime($post->created_at)) }}</span>
					<h2><a href="/blog/{{ $post->slug }}">{{ $post->title }}</a></h2>
				</header>
				<a href="#" class="image fit"><img src="{{ asset('/storage/'.$post->thumb) }}" alt="" /></a>
				<p>{{ $post->description }}</p>
				@if(isset($post->Catagory))
				<ul class="actions">
					<li><a href="/catagories/{{ $post->Catagory->name }}" class="btn btn-success">{{ $post->Catagory->name }}</a></li>
				</ul>
				@endif
			</article>
		@endforeach
	</section>
	<!-- Footer -->
	<footer>
		{!! $posts->links() !!}
	</footer>
@endif
@endsection