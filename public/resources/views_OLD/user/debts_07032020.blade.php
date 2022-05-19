

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
             <h1 class="line-height-auto height-auto text-center">
            &#163;{{  number_format($debtsCount) }}
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
                                {{-- <form>
                                    @csrf
                                    <input type="hidden" id="userId" name="userId" value="{{$userInfo->id}}">
                                </form> --}}
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
                                        @php $userDebtsCounter = 1; $totalDebtsAmount = 0;

                                         @endphp 
                                            @if(!empty($userDebts['data']))
                                                    @foreach($userDebts['data'] as $userDebtsKey => $userDebtsValue)
                                                        @php $totalDebtsAmount += $userDebtsValue['amountOwned'] @endphp
                                                                <ul class="table-body align-items-center flex-wrap debts_data" id="getDebtsData">
                                                                    <li>{{ $userDebtsCounter }}</li>
                                                                    <li>{{ number_format($userDebtsValue['amountOwned']) }}</li>
                                                                    <li>{{ $userDebtsValue['lender'] }}</li>
                                                                    <li>{{ $userDebtsValue['type'] }}</li>
                                                                    <li>{{ (trim($userDebtsValue['p_type']) != '' && !empty($userDebtsValue['p_type'])) ? $userDebtsValue['p_type'] : '-' }}</li>
                                                                    <li>{{ number_format($userDebtsValue['usualPayment']) }}</li>
                                                                    <li>@if(isset($userDebtsValue['imageUrl']) && !empty($userDebtsValue['imageUrl']))
                                                                        <a href=" {{ '../../../FREEZE/'.$userDebtsValue['imageUrl'] }} " class="text-info" download><img class="checklist-img"
                                                                            src="{{ '../../../FREEZE/'.$userDebtsValue['imageUrl']  }}"
                                                                        alt="image"></a>
                                                                        @else
                                                                        {{ 'N/A' }}
                                                                        @endif
                                                                    </li>
                                                                    <li>
                                                                        <a href="{{$userDebtsValue['id']}}"  data-toggle="collapse" data-target="#{{$userDebtsValue['id']}}"><img src="{!! asset('images/icons/Plus_Icon@2x.png')!!}" width="30" class="img-fulid" id="form-open"></a>
                                                                    </li>
                                                                            <div id="{{$userDebtsValue['id']}}" class="collapse scroll-y" style="padding: 0px 15px;width: 100%;margin-right: 30px;">
                                                                                    <form  class="debts_form_update" method="post" enctype="multipart/form-data" class="d-block">
                                                                                        <input type="hidden" name="userId" value="{{$userInfo->user_id}}">
                                                                                        <input type="hidden" name="debt_id" id="debt_id" value="{{ $userDebtsValue['id']}}">
                                                                                        <div class="row">
                                                                                            <div class="col-6">
                                                                                               
                                                                                                <div class="form-group">
                                                                                                    <label for="amount_owned">Amount Owned:</label>
                                                                                                    <input type="number" id="amount_owned_'.$userDebtsCounter.'" name="amount_owned" value="{{ $userDebtsValue['amountOwned'] }}" class="amount_owned form-control" placeholder="500">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-6">
                                                                                                <div class="form-group">
                                                                                                    <label for="lender">lender:</label>
                                                                                                    <input type="text" id="lender_'.$userDebtsCounter.'" name="lender" value="{{ $userDebtsValue['lender'] }}" class="lender form-control" placeholder="Aqua">
                                                                                                </div>
                                                                                                
                                                                                            </div>
                                                                                            <div class="col-6">
                                                                                                <div class="form-group">
                                                                                                    <label for="type">Type:</label>
                                                                                                    <input type="text" id="type_'.$userDebtsCounter.'" name="type" value="{{ $userDebtsValue['type'] }}" class="type form-control" placeholder="Credit Card">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-6">
                                                                                                <div class="form-group">
                                                                                                    <label for="type">monthly payment</label>
                                                                                                    <input type="number" id="monthly_payment_'.$userDebtsCounter.'" name="monthly_payment" value="{{ $userDebtsValue['usualPayment'] }}" class="monthly_payment form-control" placeholder="Credit Card">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-6">
                                                                                                <div class="form-group">
                                                                                                    <label for="type">image</label>
                                                                                                    <input type="file" id="image_'.$userDebtsCounter.'" name="image" value="{{ (isset($userDebtsValue['imageUrl']) && !empty($userDebtsValue['imageUrl'])) ? config('system-config.app_base_url').$userDebtsValue['imageUrl'] : '' }}" class="image form-control" placeholder="Credit Card" id="Choose_File">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-9"></div>
                                                                                            <div class="col-md-3 mt-3">
                                                                                                {{-- <a href="javascipt:void(0)" class="debts btn btn-outline-info btn-large">Update</a> --}}
                                                                                                <input type="submit" name="submit" id="submit" class="debts btn btn-outline-info btn-large">
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
                                                                                                    <input type="number " id="amount_owned" name="amount_owned" value="" class="form-control" placeholder="">
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
                    <div class="col-md-3"></div>
                </div>
            </div>
            <div class="modal-footer mt-5 mb-4">
                <a href="javascipt:void(0)" class="btn btn-outline-info float-right btn-large d-none" data-dismiss="modal">Update</a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
        $(document).ready(function(){
                $('.debts_form_update').on('submit',function(e){
                    e.preventDefault();
                    
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
                            }
                        });
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

                                    $.ajax({
                                         url: '{{ route('debts_data_get') }}', 
                                         method:'get',
                                         data:{userId:id},
                                         dataType:'json',
                                         success:function(response)
                                         {
                                            $('#getNewData').html(response);
                                         }
                                        });
                            }
                        });
                        
    });
</script>











