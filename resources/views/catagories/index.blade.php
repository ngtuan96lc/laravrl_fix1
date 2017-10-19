@extends('layouts.main')
@section('title','Catagoris')
@section('content')
<section class="catagories-list">
	<div class="form-field">
		<form action="{{ route('catagories.store') }}" method="POST" id="formName">
			{{ csrf_field() }}
			<div class="field">
				<label for="name">Catagory</label>
				<input type="text" name="name" id="name" />
			</div>
			<div class="field">
				<input type="submit" value="Create"/>
			</div>
		</form>
	</div>
	<div class="table-wrapper">
		<table class="alt">
			<thead>
				<tr>
					<th>#</th>
					<th>name</th>
				</tr>
			</thead>
			<tbody>
				@foreach($catagories as $catagory)
				<tr>
					<td>{{ $loop->index+1 }}</td>
					<td><a href="{{ route('catagories.show',['catagory' => $catagory->id]) }}">{{ $catagory->name }}</a></td>
					<td>
						<form action="{{ route('catagories.destroy',['catagory' => $catagory->id]) }}" method="POST">
							{{ csrf_field() }}
							<input type="hidden" name="_method" value="DELETE">
							<a href="{{ route('catagories.show',['catagory' => $catagory->id]) }}" class="btn btn-secondary"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
							<button type="submit" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<footer>
		{!! $catagories->links() !!}
	</footer>
</section>
@endsection
@section('scripts')
<script src="{{ asset('libs/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/validate-create-catagory-tag.js') }}"></script>
@endsection