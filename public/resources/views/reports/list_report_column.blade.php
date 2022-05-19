@extends('layouts.app')
@section('content')

<div class="container" style="margin-top: 100px;">
	<a  href="{{route('create_report')}}" class="btn btn-primary" style="margin-left: 90%;margin-bottom: 30px;">Create New Reprot</a>
	<table class="table table-striped text-center text-uppercase home-table data-table">
		<thead>
			<tr>
				<th>Id</th>
				<th>Report Name</th>
				<th>Report Type</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		@foreach($report_column as $data)
		<tbody>
			<tr>
				<td>{{$data->id}}</td>
				<td>{{$data->report_name}}</td>
				<td>{{$data->report_type}}</td>
				<td><a href="{{route('report_column.edit',$data->id)}}" class="btn btn-primary">Edit</a></td>
				<td><a href="{{route('report_column.delete',$data->id)}}" class="btn btn-primary">Delete</a></td>
			</tr>
		</tbody>
		@endforeach
	</table>
</div>
@endsection