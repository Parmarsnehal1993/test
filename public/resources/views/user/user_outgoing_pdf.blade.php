<body>
	<div class="info">
		<h5>Name : {{ $getUserDetails->name.$getUserDetails->surname }}</h5>
		<h6>Address: {{ $getUserDetails->signUpQuestionDetails->address }}</h6>
	</div>
	<div class="logo" style="float: right;margin-bottom: 10px;position: relative;bottom: 59px;">
		 <img src="asset('images/Light blue_Freeze logo@2x.png')" height="100" width="100" alt="Freeze Crm" class="img-fluid" width="180">
	</div>
<div class="container text-left" style="margin-top: 50px;position: absolute;">
	<h2>EXPENDITURE</h2>
	<div class="row">
		<div class="col-md-4">
			<table>
				<thead>
					<tr>
						<th>ESSENTIAL EXPEDITURE</th>
					</tr>
				</thead>
				<tbody>
					@foreach($getEssentialExpeditureResult as $getEssentialExpeditureResultKey => $getEssentialExpeditureResultValue)
					<tr>
						<td>
							<span class="add_dark">{{ $getEssentialExpeditureResultKey }}</span>&nbsp;&nbsp;<input type="text" name="question1" class="box" value="{{ $getEssentialExpeditureResultValue}}">
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div class="col-md-4">
			<table>
				<thead>
					<tr>
						<th>HOUSEKEEPING</th>
					</tr>
				</thead>
				<tbody>
					@foreach($geHouseKeepingResult as $geHouseKeepingResultKey => $geHouseKeepingResultValue)
					<tr>
						<td>
							<span class="add_dark">{{ $geHouseKeepingResultKey }}</span>&nbsp;&nbsp;<input type="text" name="question1" class="box" value="{{ $geHouseKeepingResultValue }}">
						</td>
					</tr>
					@endforeach
				 </tbody>
			</table>
			<br><br>
			<table>
				<thead>
					<tr>
						<th>PHONE</th>
					</tr>
				</thead>
				<tbody>
					@foreach($gePhoneResult as $gePhoneResultKey => $gePhoneResultValue)
					<tr>
						<td>
							<span class="add_dark">{{ $gePhoneResultKey }}</span>&nbsp;&nbsp;<input type="text" name="question1" class="box" value="{{ $gePhoneResultValue }}">
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
			<br><br>
			<table>
				<thead>
					<tr>
						<th>TRAVEL</th>
					</tr>
				</thead>
				<tbody>
					@foreach($geTravelResult as $geTravelResultKey => $geTravelResultValue)
					<tr>
						<td>
							<span class="add_dark">{{ $geTravelResultKey }}</span>&nbsp;&nbsp;<input type="text" name="question1" class="box" value="{{ $geTravelResultValue }}">
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div class="col-md-4">
			<table>
				<thead>
					<tr>
						<th>OTHER EXP</th>
					</tr>
				</thead>
				<tbody>
					@foreach($geOtherExpResult as $geOtherExpResultKey => $geOtherExpResultValue)
					<tr>
						<td>
							<span class="add_dark">{{ $geOtherExpResultKey }}</span>&nbsp;&nbsp;<input type="text" name="question1" class="box" value="{{ $geOtherExpResultValue }}">
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<div class="basic_detail">';
				@php
	                $totalIncome = getIncome($userId);
	                $totalOutgoings = getOutgoing($userId);
	                $disposabale = getTotalDisposable($userId);
	                $debt = getDebtAmount($userId);
	                $total_contribution = $disposabale*60;
	                $potential_debt_written_off = $debt - $total_contribution;
	                $fees = 3650;
	                $paid_to_creditor = $total_contribution - $fees;
	                $dividend = $paid_to_creditor / $debt;
	            @endphp
	            <table>
		            <tr>
		                <td class="add_dark">INCOME:</td>&nbsp;&nbsp;
		                <td>&#163; {{ $totalIncome }} </td><br>
		            </tr>
		            <tr>
		                <td class="add_dark">EXPENDITURE:</td>&nbsp;&nbsp;
		                <td>&#163; {{ $totalOutgoings }}</td><br>
		            </tr>
		            <tr>
		                <td class="add_dark">DISPOSABALE:</td>&nbsp;&nbsp;
		                <td>&#163; {{ $disposabale }}</td><br>
		            </tr>
		            <tr>
		                <td class="add_dark">DEBT:</td>&nbsp;&nbsp;&nbsp;
		                <td>&#163; {{ $debt }}</td><br>
		            </tr>
		            <tr>
		               	<td class="add_dark">TOTAL CONTRIBUTION:</td>&nbsp;&nbsp;
		                <td>&#163; {{ $total_contribution }}</td><br>
		            </tr>
		            <tr>
		               	<td class="add_dark">POTENTIAL DEBT WRITTEN OFF:</td>&nbsp;&nbsp;
		                <td>&#163; {{ $potential_debt_written_off }}</td><br>
		            </tr>
		            <tr>
		                <td class="add_dark">FEES:</td>&nbsp;&nbsp;
		                <td>&#163; {{ $fees }}</td><br>
		            </tr>
		            <tr>
		                <td class="add_dark">PAID TO CREDITORS:</td>&nbsp;&nbsp;
		                <td>&#163; {{ $paid_to_creditor }}</td><br>
		            </tr>
		            <tr>
		                <td class="add_dark">DIVIDEND:</td>
		                <td>&#163; {{ $dividend }}</td>
		            </tr>
	            </table>
	         </div>
		</div>
	</div>
</div>
</body>
