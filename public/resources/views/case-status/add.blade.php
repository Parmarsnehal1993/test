@extends('layouts.app')
@section('content')

	<div class="container" style="margin-top: 100px;">

		<div class="container" style="margin-top: 30px;">
  			@if($errors->any())
  				<div class="alert alert-danger">
    				<ul>
      					@foreach($errors->all() as $error)
      						<li>{{$error}}</li>
      					@endforeach
    				</ul>
  				</div><br>
 			 @endif
		</div>
				@if(Session::has('flash_message_added'))
    				<div class="alert alert-success" style="margin-top: 10px;"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message_added') !!}</em></div>
				@endif

				@if(Session::has('flash_message_updated'))
    				<div class="alert alert-success" style="margin-top: 10px;"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message_updated') !!}</em></div>
				@endif
					
				@if(empty($edit_case))
					<h1 class="text-center" style="font-size: 25px;">ADD CASE STATUS</h1><hr>
				@else
					<h1 class="text-center" style="font-size: 25px;">UPDATE CASE STATUS</h1><hr>
				@endif

		<div class="col-lg-12" style="margin-top: 30px;">
			<div class="col-lg-3"></div>
				<div class="col-lg-6">
					@if(empty($edit_case))
						<form action="{{route('case-status')}}" method="POST">
					@else
						<form action="{{route('case-status-update',$edit_case->id)}}" method="post">
					@endif
                            @csrf    
                            <div class="form-group">
                            	<input type="text" name="case_status" class="form-control" value="@isset($edit_case){{$edit_case->name}}@endisset" placeholder="Enter Case Name">
                            </div>

                            <div class="form-group">
                            	<input type="submit" name="submit" class="btn btn-primary btn-lg">
                            </div>
                        </form>
                </div>
                <div class="col-lg-3">
                		
                </div>
       	</div>
   	</div>
@endsection