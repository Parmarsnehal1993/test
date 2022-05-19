@extends('layouts.app')
@section('content')

<style type="text/css">
	.style{
		margin: 0 auto;
		margin-bottom: 4%;
	}
	.form-control{
		width: 50%;
	}
	.style_checkbox{
		text-align: center !important;
	}
</style>
<div class="container" style="margin-top: 100px;">
	@if(empty($data['report_column_data']))
		<h1 style="font-size: 30px;" class="text-center">Create Report Column</h1><hr>
	@else
		<h1 style="font-size: 30px;" class="text-center">Update Report Column</h1><hr>
	@endif

	@if(empty($data['report_column_data']))
		<form method="post" action="{{route('report_column')}}">
	@else
		<form method="post" action="{{route('report_column_update',$data['report_column_data']->id)}}">
	@endif	
		@csrf
		<div class="form-group">
				<input type="text" name="report_name"  value='@if(isset($data['report_column_data'])){{$data['report_column_data']->report_name}}@else "" @endif ' class="form-control style">
		</div>
		<div class="form-group">
				<select name="report_type" class="form-control style">
					<option>Please Select type</option>
					<option value="1">Percentage</option>
					<option value="2">Total</option>
				</select>
		</div>
		@if(empty($data['report_column_data']))
		<div class="form-group style_checkbox">
			@foreach($case_status as $result)
			<input type="checkbox" name="case_status[]" value="{{$result->id}}">{{$result->name}}&nbsp;&nbsp;
			@endforeach
		</div>
		@else
		
		@foreach($case_status as $caseStatusKey => $caseStatusValue)
					@php $currentCheckboxChecked = ''; 
					@endphp

					@if(in_array($caseStatusValue['id'],$case_status_id)) 
						@php $currentCheckboxChecked = 'checked'; @endphp
					@endif
					<input {{ $currentCheckboxChecked }}  type="checkbox" name="case_status[]" value="{{$caseStatusValue['id']}}">{{$caseStatusValue['name']}}&nbsp;&nbsp;

			@endforeach
		@endif
		<div class="form-group style_checkbox">
			<input type="submit" name="submit" class="btn btn-primary btn-lg style">
		</div>
	</form>
</div>
@endsection