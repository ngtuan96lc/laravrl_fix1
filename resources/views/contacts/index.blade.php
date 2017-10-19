@extends('layouts.main')
@section('title','Contacts')
@section('content')
<section class="posts-list">
	<h3>Contacts</h3>
	<div class="table-wrapper">
		<table class="alt">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Message</th>
				</tr>
			</thead>
			<tbody>
				@foreach($contacts as $contact)
				<tr class="{{ $contact->read?'bg-white':'bg-secondary' }}">
					<td>{{ $loop->index+1 }}</td>
					<td>{{ $contact->name }}</td>
					<td>{{ substr($contact->message,0,50) }}{{ strlen($contact->message)>50?'...':'' }}</td>
					<td><form action="{{ route('contacts.destroy',['contact' => $contact->id]) }}" method="POST">
						{{ csrf_field() }}
						<input type="hidden" name="_method" value="DELETE"><a href="{{ route('contacts.show',['contact' => $contact->id]) }}" class="btn btn-primary">Read</a> <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button></form></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<footer>
		{!! $contacts->links() !!}
	</footer>
</section>
@endsection