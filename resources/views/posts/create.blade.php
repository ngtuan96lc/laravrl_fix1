@extends('layouts.main')
@section('title','Create post')
@section('stylesheets')
<link href="{{ asset('libs/select2.min.css') }}" rel="stylesheet" />
@endsection
@section('content')
<div class="form-field">
	<form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data" id="postForm">
		{{ csrf_field() }}
		<div class="field">
			<label for="title">Title</label>
			<input type="text" name="title" id="title" />
		</div>
		<div class="field">
			<label for="catagory">Catagory</label>
			<select name="catagory" id="catagory">
				@foreach($catagories as $catagory)
				<option value="{{ $catagory->id }}">{{ $catagory->name }}</option>
				@endforeach
			</select>
		</div>
		<div class="field">
			<label for="description">Description</label>
			<input type="text" name="description" id="description" />
		</div>
		<div class="field">
			<label for="thumb">Thumb</label>
			<input type="file" name="thumb" id="thumb" accept="image/*"/>
		</div>
		<div class="field">
			<label for="content">Content</label>
			<textarea name="content" id="content" rows="15"></textarea>
		</div>
		<div class="field">
			<label for="tags">Tags</label>
			<select name="tags[]" id="tags" multiple="multiple">
				@foreach($tags as $tag)
				<option value="{{ $tag->id }}">{{ $tag->name }}</option>
				@endforeach
			</select>
		</div>
		<ul class="actions">
			<li><input type="submit" value="Create"/></li>
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