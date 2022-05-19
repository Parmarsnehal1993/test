<style>
    .debts-report-table{
	max-width: 20vw;
}
.debts-report-table td, .debts-report-table th{
    vertical-align: middle;
}
.value{
	font-size: 30px;
	font-family: avenir_heavy;
}
</style>
<div class="row">
    <div class="col-6"></div>
    <div class="col-6">
        <div class="card-body">
            @php
            $debtsCount = 0;
            @endphp

            @if(isset($userDebts) && !empty($userDebts))
                @foreach($userDebts['data'] as $userDebtsKey => $userDebtsValue)
                    @php $debtsCount += $userDebtsValue['amountOwned'] @endphp
                 @endforeach
             @endif
             <h1 class="line-height-auto height-auto text-center calculated_total_debts">
            &#163; {{ number_format($debtsCount) }}
            </h1>
        </div>
    </div>
</div>

<div class="plus-sign" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#debts_modal">
    <img src="{!! asset('images/icons/Plus_Icon@2x.png')!!}" alt="Add" class="add-button" width="30">
</div>
<div id="debts_modal" class="modal fade debts_modal" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content card card-secondary">
            <div class="modal-header">
                <div class="card-title debts-total-amount">
                </div>
                <button type="button" class="close alert_open" id="alert_open" aria-label="Close">
                <img src="{!! asset('images/icons/Cross_Icon@2x.png')!!}" alt="Close" class="img-fulid" width="40" height="40"></button>
            </div>
            <div class="modal-body assets-data">
                <div class="row">
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="row mt-0">
                                    <div class="width-100">
                                        <ul class="table-header align-items-center flex-wrap">
                                            <li>SR</li>
                                            <li>Amount Owned</li>
                                            <li>Lender</li>
                                            <li>Type</li>
                                            <li>Priority</li>
                                            <li>Monthly Payment</li>
                                            <li>Image</li>
                                            <li></li>
                                        </ul>
                                        @php
                                            $userDebtsCounter = 1; $totalDebtsAmount = 0;
                                        @endphp 
                                            @if(!empty($userDebts['data']))
                                                @foreach($userDebts['data'] as $userDebtsKey => $userDebtsValue)
                                                    @php $totalDebtsAmount += $userDebtsValue['amountOwned'] @endphp
                                                        <ul class="table-body align-items-center flex-wrap debts_data" id="getDebtsData">
                                                            <li class="user_debts_counter">{{ $userDebtsCounter }}</li>
                                                            <li class="debts_amountOwned_value" id="single_debts_amountOwned_value_{{ $userDebtsCounter }}">{{ $userDebtsValue['amountOwned'] }}</li>
                                                            <li class="debts_lender_value" id="single_debts_lender_value_{{ $userDebtsCounter }}">{{ $userDebtsValue['lender'] }}</li>
                                                            <li class="debts_type_value" id="single_debts_type_value_{{ $userDebtsCounter }}">{{ $userDebtsValue['type'] }}</li>
                                                            <li class="debts_p_type_value" id="single_debts_p_type_value_{{ $userDebtsCounter }}">{{ (trim($userDebtsValue['p_type']) != '' && !empty($userDebtsValue['p_type'])) ? $userDebtsValue['p_type'] : '-' }}</li>
                                                            <li class="debts_usualPayment_value" id="single_debts_usualPayment_value_{{ $userDebtsCounter }}">{{ $userDebtsValue['usualPayment'] }}</li>
                                                            <li class="debts_imageUrl_value" id="single_debts_imageUrl_value_{{ $userDebtsCounter }}">@if(isset($userDebtsValue['imageUrl']) && !empty($userDebtsValue['imageUrl']))
                                                                <a href=" {{ '../../../FREEZE/'.$userDebtsValue['imageUrl'] }} " class="text-info" download><img class="checklist-img"
                                                                    src="{{ '../../../FREEZE/'.$userDebtsValue['imageUrl']  }}"
                                                                alt="image"></a>
                                                                @else
                                                                {{ 'N/A' }}
                                                                @endif
                                                            </li>
                                                            <li>
                                                                 @if(isset($userDebtsValue['id']) && !empty($userDebtsValue['id']))
                                                                    <a id="user_debt_delete"  data-debt_deleted_id="{{ $userDebtsValue['id']  }}"><img src="{!! asset('images/icons/Cross_Icon@2x.png')!!}" width="30" class="img-fulid" id="form-open"></a>
                                                                @endif
                                                                <a href="{{$userDebtsValue['id']}}"  data-toggle="collapse" data-target="#{{$userDebtsValue['id']}}"><img src="{!! asset('images/icons/Plus_Icon@2x.png')!!}" width="30" class="img-fulid" id="form-open"></a>
                                                            </li>
                                                            <div id="{{$userDebtsValue['id']}}" class="collapse scroll-y" style="padding: 0px 15px;width: 100%;margin-right: 30px;">
                                                                <form  class="debts_form_update" data-debts_counter="{{ $userDebtsCounter }}" data-debt_update_id="{{ $userDebtsValue['id'] }}" method="post" enctype="multipart/form-data" class="d-block">
                                                                    <input type="hidden" name="userId" value="{{$userInfo->user_id}}">
                                                                    <input type="hidden" name="debt_id" id="debt_id" value="{{ $userDebtsValue['id']}}">
                                                                    <input type="hidden" name="counter" id="counter" value="{{ $userDebtsCounter }}">
                                                                    <div class="row">
                                                                        <div class="col-6">
                                                                            <div class="form-group">
                                                                                <label for="amount_owned">Amount Owned:</label>
                                                                                <input type="number" id="amount_owned_{{ $userDebtsCounter }}" name="amount_owned" value="{{ $userDebtsValue['amountOwned'] }}" class="amount_owned form-control" placeholder="Amount Owned">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="form-group">
                                                                                <label for="lender">lender:</label>
                                                                                <input type="text" id="lender_{{ $userDebtsCounter }}" name="lender" value="{{ $userDebtsValue['lender'] }}" class="lender form-control" placeholder="Aqua">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="form-group">
                                                                                <label for="type">Type:</label>
                                                                                <select id="type" name="type" id="type" class="form-control" style="width: 100%" required>
                                                                                    <option value="{{$userDebtsValue['type'] }}" selected="selected">{{$userDebtsValue['type'] }}</option>
                                                                                    <option value="Rent arrears">Rent arrears</option>
                                                                                    <option value="Mortgage arrears">Mortgage arrears</option>
                                                                                    <option value="Magistrate court fines">Magistrate court fines</option>
                                                                                    <option value="Council tax arrears">Council tax arrears</option>
                                                                                    <option value="Family or friends loan">Family or friends loan</option>
                                                                                    <option value="Gas or electric arrears">Gas or electric arrears</option>
                                                                                    <option value="Hire purchase">Hire purchase</option>
                                                                                    <option value="Guarantor loan">Guarantor loan</option>
                                                                                    <option value="Overdraft">Overdraft</option>
                                                                                    <option value="Benifit overpayment">Benifit overpayment</option>
                                                                                    <option value="Catalogue">Catalogue</option>
                                                                                    <option value="Credit card">Credit card</option>
                                                                                    <option value="Other">Other</option>
                                                                                    <option value="Payday loan">Payday loan</option>
                                                                                    <option value="Personal loan">Personal loan</option>
                                                                                    <option value="Store card">Store card</option>
                                                                                    <option value="TV Licence arrears">TV Licence arrears</option>
                                                                                    <option value="Water arrears">Water arrears</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="form-group">
                                                                                <label for="type">monthly payment</label>
                                                                                <input type="number" id="monthly_payment_{{ $userDebtsCounter }}" name="monthly_payment" value="{{ $userDebtsValue['usualPayment'] }}" class="monthly_payment form-control" placeholder="Credit Card">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="form-group">
                                                                                <label for="type">image</label>
                                                                                <input type="file" id="image_{{ $userDebtsCounter }}" name="image" value="{{ (isset($userDebtsValue['imageUrl']) && !empty($userDebtsValue['imageUrl'])) ? config('system-config.app_base_url').$userDebtsValue['imageUrl'] : '' }}" class="image form-control" placeholder="Credit Card" id="Choose_File">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-9"></div>
                                                                        <div class="col-md-3 mt-3">
                                                                            {{-- <a href="javascipt:void(0)" class="debts btn btn-outline-info btn-large">Update</a> --}}
                                                                            <input type="submit" name="submit" id="submit" class="debts btn btn-outline-info btn-large update_single_debt"  data-asset_id="{{ $userDebtsValue['id'] }}" data-asset_counter="{{ $userDebtsCounter }}">
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </ul>
                                                    @php $userDebtsCounter++ @endphp
                                                @endforeach
                                            @else
                                        <hr>
                                        <h3 class="text-center" style="margin-top: 20px;">Debts not available</h3>
                                        @endif
                                        <div id="dynamic_debts_data"></div>
                                        <ul class="table-body align-items-center flex-wrap  debts_data" id="getNewData">
                                            <li>-</li>
                                            <li>-</li>
                                            <li>-</li>
                                            <li>-</li>
                                            <li>-</li>
                                            <li>-</li>
                                            <li>-</li>
                                            <li>
                                                <a href="javascript:void(0)" data-toggle="collapse" data-target="#add_debts" class="getDebts collapsed" aria-expanded="false"><img src="{!! asset('images/icons/Plus_Icon@2x.png')!!}" width="30" class="img-fulid" id="form-open"></a>
                                            </li>
                                            <div id="add_debts" class="scroll-y collapse" style="padding: 0px 15px; width: 100%; margin-right: 30px;">
                                                <form class="debts_form_add" method="post" enctype="multipart/form-data">
                                                    <input type="hidden" name="userId" value="{{ $userInfo->user_id}}">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="amount_owned">Amount Owned:</label>
                                                                <input type="number" id="amount_owned" name="amount_owned" value="" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="lender">lender:</label>
                                                                <input type="text" id="lender" name="lender" value=" " class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="type">Type:</label>
                                                                <select id="type" name="type" id="type" class="form-control" style="width: 100%" required>
                                                                    <option value="" selected="selected"></option>
                                                                    <option value="Rent arrears">Rent arrears</option>
                                                                    <option value="Mortgage arrears">Mortgage arrears</option>
                                                                    <option value="Magistrate court fines">Magistrate court fines</option>
                                                                    <option value="Council tax arrears">Council tax arrears</option>
                                                                    <option value="Family or friends loan">Family or friends loan</option>
                                                                    <option value="Gas or electric arrears">Gas or electric arrears</option>
                                                                    <option value="Hire purchase">Hire purchase</option>
                                                                    <option value="Guarantor loan">Guarantor loan</option>
                                                                    <option value="Overdraft">Overdraft</option>
                                                                    <option value="Benifit overpayment">Benifit overpayment</option>
                                                                    <option value="Catalogue">Catalogue</option>
                                                                    <option value="Credit card">Credit card</option>
                                                                    <option value="Other">Other</option>
                                                                    <option value="Payday loan">Payday loan</option>
                                                                    <option value="Personal loan">Personal loan</option>
                                                                    <option value="Store card">Store card</option>
                                                                    <option value="TV Licence arrears">TV Licence arrears</option>
                                                                    <option value="Water arrears">Water arrears</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="type">monthly payment</label>
                                                                <input type="number" id="monthly_payment" name="monthly_payment" value="" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="type">image</label>
                                                                <input type="file" id="image" name="image" value="" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-9"></div>
                                                        <div class="col-md-3 mt-3">
                                                            <input type="submit" name="submit" id="submit" class="debts btn btn-outline-info btn-large">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     @php
                        $debts = getTotalDebts($userInfo->user_id);
                        $total_amount = getDebtAmountforAjax($userInfo->user_id);
                    @endphp
                   <div class="col-md-10">
                    	<table class="table debts-report-table">
                    	    <tbody>
                    	        <tr>
                    	        	<td>Monthly payment:</td>
                    	        	<td class="value" id="get_debts_payment">{{ $debts }}</td>
                    	    	</tr>
                    	        <tr>
                    	        	<td>Total Amount:</td>
                    	        	<td class="value" id="get_debts_amount">{{ $total_amount }}</td>
                    			</tr>
                    		</tbody>
                    	</table>
                    </div>
                </div>
            </div>
            <div class="modal-footer mt-5 mb-4">
                <a href="javascipt:void(0)" class="btn btn-outline-info float-right btn-large d-none" data-dismiss="modal">Update</a>
            </div>
        </div>
    </div>
    
</div>

<script type="text/javascript">
    $(document).on('submit', '.debts_form_update', function(e){
        e.preventDefault();

        var update_debt_counter = $(this).data('debts_counter');
        var id = $(this).data('debt_update_id');

        $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:'{{ route('user.update_user_debts') }}',
            method:'POST',
            data:new FormData(this),
            dataType:'json',
            contentType: false,
            cache: false,
            processData: false,
            success:function(data)
            {
                var messageIcon = 'error';
                if (data == 'RequiredAmount') {
                    var message = 'Amount is required';
                } else if (data == 'RequiredLender') {
                    var message = 'Lender is required';
                } else if (data == 'RequiredType') {
                    var message = 'Type is required';
                } else if (data == 'RequiredPayment') {
                    var message = 'Payment is required';
                }  else if (data == 'success') {
                    var message = 'User Debts updated successfully';
                    var messageIcon = 'success';
                } else {
                    var message = 'something wrong please try again';
                }
                swal(message, {
                  icon: messageIcon,
                });

                $.ajax({
                    url: '{{ route('get_single_updated_debt_data') }}', 
                    method:'get',
                    data:{
                        id:id
                    },
                    dataType:'json',
                    success:function(response)
                    {
                        $('#single_debts_amountOwned_value_'+update_debt_counter).html(response.amountOwned);
                        $('#single_debts_lender_value_'+update_debt_counter).html(response.lender);
                        $('#single_debts_type_value_'+update_debt_counter).html(response.type);
                        $('#single_debts_p_type_value_'+update_debt_counter).html(response.p_type);
                        $('#single_debts_usualPayment_value_'+update_debt_counter).html(response.usualPayment);
                        var str_img = '';
                        str_img += '<a href="../../../FREEZE/'+response.imageUrl+'" class="text-info" download><img class="checklist-img" src="../../../FREEZE/'+response.imageUrl+'" alt="image"></a>';
                        $('#single_debts_imageUrl_value_'+update_debt_counter).html(str_img);

                        var total_debts = 0;
                        $('.debts_amountOwned_value').each(function(){
                            total_debts += parseInt($(this).text());
                        });

                        $('.calculated_total_debts').html('£ ' + total_debts);
                    }
                });
            }
        });
    });
</script>

<script>
    
    $('.debts_form_add').on('submit',function(e)
    {
        e.preventDefault();

        $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:'{{ route('user.add_user_debts') }}',
            method:'POST',
            data:new FormData(this),
            dataType:'json',
            contentType: false,
            cache: false,
            processData: false,
            success:function(data)
            {
                var messageIcon = 'error';
                if (data == 'RequiredAmount') {
                    var message = 'Amount is required';
                } else if (data == 'RequiredLender') {
                    var message = 'Lender is required';
                } else if (data == 'RequiredType') {
                    var message = 'Type is required';
                } else if (data == 'RequiredPayment') {
                    var message = 'Payment is required';
                }  else if (data != '') {
                    var message = 'User Debts save successfully';
                    var messageIcon = 'success';
                } else {
                    var message = 'something wrong please try again';
                }
                
                swal(message, {
                  icon: messageIcon,
                });
                var id = data;

                var debts_counter_js = $( ".user_debts_counter" ).last().text();
                if(debts_counter_js != "") {
                    debts_counter_js = parseInt(debts_counter_js) + 1;
                } else {
                    debts_counter_js = 1;
                }

                $.ajax({
                    url: '{{ route('debts_data_get') }}', 
                    method:'get',
                    data:{
                        id:id,
                        counter:debts_counter_js
                    },
                    dataType:'json',
                    success:function(response)
                    {
                        //$('#dynamic_debts_data').html(response);
                        $('#dynamic_debts_data').append(response);

                        var total_debts = 0;
                        $('.debts_amountOwned_value').each(function(){
                            total_debts += parseInt($(this).text());
                        });

                        $('.calculated_total_debts').html('£ ' + total_debts);

                        //$('#getNewData').html(response);

                        var userId = $('#userId').val();
                        $.ajax({
                            url : '{{ route('user.getAjaxDebtsPayment') }}',
                            method : 'Get',
                            data : {userId : userId},
                            dataType : 'json',
                            success:function(data)
                            {
                                var total = JSON.parse(data.total);
                                var amountOwned = JSON.parse(data.amountOwned);
                                // var total = JSON.parse.total);
                                // var amountOwned = (parse.amountOwned);

                                $('#get_debts_payment').text(total);
                                $('#get_debts_amount').text(amountOwned);
                            }
                        })

                    }
                });
            }
        });
    });
     $(document).on('click','#user_debt_delete',function(e){
        e.preventDefault();
        var deleteConfirm = confirm('Are you sure to delete this record ?');
        var debt_id = $(this).data('debt_deleted_id');
        if(debt_id != "" && deleteConfirm != ""){
            $.ajax({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url : "{{ route('user_debt_deleted') }}",
                method : "post",
                data : {
                    debt_id : debt_id
                },
                dataType : "json",
                success : function(data){
                    var messageIcon = 'error';
                    if (data == 'success') {
                        var message = 'User Debts deleted successfully';
                        var messageIcon = 'success';
                    } else {
                        var message = 'something wrong please try again';
                    }
                    swal(message, {
                        icon: messageIcon,
                    });
                    location.reload();
                }
            });
        }
        
    });
</script>

