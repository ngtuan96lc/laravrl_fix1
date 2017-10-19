@extends('layouts.main')
@section('title','Home')
@section('content')
@if(isset($posts) && count($posts) > 0)
	<!-- Featured Post -->
	<article class="post featured">
		<header class="major">
			<span class="date">{{ date('M d, Y',strtotime($posts[0]->created_at)) }}</span>
			<h2><a href="/blog/{{ $posts[0]->slug }}">{{ $posts[0]->title }}</a></h2>
			<p>{{ $posts[0]->description }}</p>
		</header>
		<a href="/blog/{{ $posts[0]->slug }}" class="image main"><img src="{{ asset('/storage/'.$posts[0]->thumb) }}" alt="{{ $posts[0]->title }}" title="{{ $posts[0]->title }}" /></a>
		@if(isset($posts[0]->Catagory))
		<ul class="actions">
			<li><span class="btn btn-success btn-lg">{{ $posts[0]->Catagory->name }}</span></li>
		</ul>
		@endif
	</article>
	<!-- Posts -->
	<section class="posts">
		@foreach($posts as $post)
			@if(!$loop->first)
			<article>
				<header>
					<span class="date">{{ date('M d, Y',strtotime($post->created_at)) }}</span>
					<h2><a href="/blog/{{ $post->slug }}">{{ $post->title }}</a></h2>
				</header>
				<a href="/blog/{{ $post->slug }}" class="image fit"><img src="{{ asset('/storage/'.$post->thumb) }}" alt="{{ $post->title }}" title="{{ $post->title }}" /></a>
				<p>{{ $post->description }}</p>
				@if(isset($post->Catagory))
				<ul class="actions">
					<li><span class="btn btn-success">{{ $post->Catagory->name }}</span></li>
				</ul>
				@endif
			</article>
			@endif
		@endforeach
	</section>
	<!-- Footer -->
	<footer>
		{!! $posts->links() !!}
	</footer>
@endif
@endsection