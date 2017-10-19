@extends('layouts.main')
@section('title','Edit post')
@section('stylesheets')
<link href="{{ asset('libs/select2.min.css') }}" rel="stylesheet" />
@endsection
@section('content')
<div class="form-field">
	<form method="POST" action="{{ route('posts.update',['post' => $post->id]) }}" enctype="multipart/form-data" id="postForm">
		{{ csrf_field() }}
		<input type="hidden" name="_method" value="PUT">
		<div class="field">
			<label for="title">Title</label>
			<input type="text" name="title" id="title" value="{{ $post->title }}" />
		</div>
		<div class="field">
			<label for="catagory">Catagory</label>
			<select name="catagory" id="catagory">
				<option value="">-- Catagory --</option>
				@foreach($catagories as $catagory)
				<option value="{{ $catagory->id }}" {{ $catagory->id == $post->catagory_id?'selected':'' }}>{{ $catagory->name }}</option>
				@endforeach
			</select>
		</div>
		<div class="field">
			<label for="description">Description</label>
			<input type="text" name="description" id="description" value="{{ $post->description }}" />
		</div>
		<div class="field">
			<label for="thumb">Thumb</label>
			<input type="file" name="thumb" id="thumb" accept="image/*"/>
		</div>
		<div class="field">
			<label for="content">Content</label>
			<textarea name="content" id="content" rows="15">{{ $post->content }}</textarea>
		</div>
		<div class="field">
			<label for="content">Tags</label>
			<select name="tags[]" id="tags" multiple="multiple">
				@foreach($tags as $tag)
				<option value="{{ $tag->id }}" {{ $post->Tags->contains($tag)?'selected':'' }}>{{ $tag->name }}</option>
				@endforeach
			</select>
		</div>
		<ul class="actions">
			<li><input type="submit" value="Save"/></li>
		</ul>
	</form>
</div>
@endsection
@section('scripts')
<script src="{{ asset('libs/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/validate-create-post.js') }}"></script>
<script src="{{ asset('libs/select2.min.js') }}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/1.0.0-alpha.1/classic/ckeditor.js"></script>
<script>
	$(document).ready(function() {
		  ClassicEditor
        .create( document.querySelector( '#content' ) )
        .catch( error => {
            console.error( error );
        } );
	    $('#tags').select2();
	});
</script>
@endsection