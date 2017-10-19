@extends('layouts.main')
@section('title',$post->title)
@section('content')
<!-- Post -->
<section class="post">
	<header class="major">
		<span class="date">{{ date('M d, Y',strtotime($post->created_at)) }}</span>
		<h1>{{ $post->title }}</h1>
		<p>{{ $post->description }}</p>
	</header>
	<div class="image main"><img src="{{ asset('/storage/'.$post->thumb) }}" alt="" /></div>
	<p>{!! $post->content !!}</p>
	<hr>
	<div class="tags"> <strong>Tag:</strong>
		@foreach($post->Tags as $tag)
		<span class="badge badge-{{ array_rand(array_flip(['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark'])) }}">{{ $tag->name }}</span>
		@endforeach
	</div>
</section>
@endsection