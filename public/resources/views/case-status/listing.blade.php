@extends('layouts.app')
@section('content')

<div class="container" style="margin-top: 50px;">

	@if(Session::has('flash_message'))
    				<div class="alert alert-success" style="margin-top: 10px;"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message_deleted') !!}</em></div>
	@endif
	<a href="{{route('case-add')}}" class="btn btn-primary" style="margin-left: 80%;margin-bottom: -57px;">Add Case Status</a>
	<h1 class="text-center" style="font-size: 25px;">All Case Status Listing</h1><hr>

	<table class="table table-striped text-center text-uppercase home-table data-table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		@foreach($data as $result)
		<tbody>
			<tr>
				<td>{{$result->id}}</td>
				<td>{{$result->name}}</td>
				<td><a href="{{route('edit-case',$result->id)}}" class="btn btn-primary">Edit</a></td>
				<td><a href="{{route('delete-case',$result->id)}}" onclick="return confirm('are you sure want to delete case')" class="btn btn-primary">Delete</a></td>
			</tr>
		</tbody>
		@endforeach
	</table>
</div>
@endsection