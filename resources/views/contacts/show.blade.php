@extends('layouts.main')
@section('title','Contacts')
@section('content')
<section class="posts-list">
	<h3><a href="{{ route('contacts.index') }}"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Contact</a></h3>
	<div class="table-wrapper">
		<table>
			<tbody>
				<tr>
					<td class="bg-white"><strong>Name: </strong>{{ $contact->name }}</td>
				</tr>
				<tr>
					<td><strong>Email: </strong>{{ $contact->email }}</td>
				</tr>
				<tr>
					<td class="bg-white">{{ $contact->message }}</td>
				</tr>
			</tbody>
		</table>
	</div>
</section>
@endsection