
<div class="col-12 p-0 solution-lists"> 
    <div class="ml-0 mr-0">
       @if($country_id == 1)
        <h1 class="soluttion-title">UK:
       @elseif($country_id == 3)
       <h1 class="soluttion-title">Scotland:
       @endif
        </h1>
       
        <div class="row">
            <div class="col-md-6">
                <table class="table w-100">
                    <tr>
                        <td>
                            Total Debt Level:
                        </td>
                        <td>
                            £ {{ number_format($res_user_debts,2) }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Total Priority Debt Level:
                        </td>
                        <td>
                            £ {{ number_format($totalPriorityDebtsPayment,2) }}
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <table class="table w-100">
                    <tr>
                        <td>
                        Total monthly debt payments:
                        </td>
                        <td>
                        £ {{ number_format($getTotalDebtsforReview,2) }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                        Disposable Income:
                        </td>
                        <td>
                        £ {{ number_format($totalDisposable,2) }}
                        </td>
                    </tr>
                </table>
            </div>
            
        </div>
        <table class="table table-review-list solution-table">
                
                <tr>
                    <th></th>
                    @if(isset($allAvailableSolutionsForReviewPage) && !empty($allAvailableSolutionsForReviewPage))
                        @foreach($allAvailableSolutionsForReviewPage as $key => $value)
                            <th @if($value['enable'] == false) style="color: gainsboro;" @endif>{{ $value['title'] }}</th>
                        @endforeach
                    @endif
                </tr>
                <tr>
                        <td>Debt Writeen off</td>
                        @if(isset($allAvailableSolutionsForReviewPage) && !empty($allAvailableSolutionsForReviewPage))
                            @foreach($allAvailableSolutionsForReviewPage as $debtKey => $debtValue)
                                @if($debtValue['enable'] == true)
                                    @if($debtValue['amount_of_debt_written_off'] < 0)
                                        <td>{{ 'N/A' }}</td>
                                    @else 
                                        <td>£{{ number_format($debtValue['amount_of_debt_written_off'],2) }}</td>
                                    @endif
                                @else 
                                    <td>Not Availble</td>
                                @endif
                            @endforeach
                        @endif
                    </tr>
                    <tr>
                        <td>Monthly cost</td>
                        @if(isset($allAvailableSolutionsForReviewPage) && !empty($allAvailableSolutionsForReviewPage))
                            @foreach($allAvailableSolutionsForReviewPage as $MonthlyCostKey => $MonthlyCostValue)
                                @if($MonthlyCostValue['enable'] == true)
                                    @if($MonthlyCostValue['monthly_cost'] < 0)
                                        <td>{{ 'N/A' }}</td>
                                    @else 
                                        <td>£{{ number_format($MonthlyCostValue['monthly_cost'],2) }}</td>
                                    @endif
                                @else
                                    <td>Not Availble</td>
                                @endif
                            @endforeach
                        @endif
                    </tr>
                    <tr>
                        <td>One off cost</td>
                        @if(isset($allAvailableSolutionsForReviewPage) && !empty($allAvailableSolutionsForReviewPage))
                            @foreach($allAvailableSolutionsForReviewPage as $oneCostKey => $oneCostValue)
                                @if($oneCostValue['enable'] == true)
                                    @if($oneCostValue['one_off_cost'] < 0)
                                        <td>{{ 'N/A' }}</td>
                                    @else
                                        <td>£{{ number_format($oneCostValue['one_off_cost'],2) }}</td>
                                    @endif
                                @else 
                                    <td>Not Available</td>
                                @endif
                            @endforeach
                        @endif
                    </tr>
                    <tr>
                        <td>Term months</td>
                        @if(isset($allAvailableSolutionsForReviewPage) && !empty($allAvailableSolutionsForReviewPage))
                            @foreach($allAvailableSolutionsForReviewPage as $termKey => $termValue)
                                @if($termValue['enable'] == true)
                                    @if($debtValue['term'] < 0)
                                        <td>{{ 'N/A' }}</td>
                                    @else 
                                        <td>{{ number_format($debtValue['term'],2) }}</td>
                                    @endif
                                @else 
                                    <td>Not Availble</td>
                                @endif
                            @endforeach
                        @endif
                    </tr>
                    <tr>
                        <td>Monthly reduced</td>
                        @php 
                            $monthly_reduced = "";
                        @endphp
                        @if(isset($allAvailableSolutionsForReviewPage) && !empty($allAvailableSolutionsForReviewPage))
                            @foreach($allAvailableSolutionsForReviewPage as $mothReduceKey => $monthReduceValue)
                            @php 
                            $monthly_reduced = $getTotalDebtsforReview - $monthReduceValue['monthly_cost'];
                            @endphp
                                @if($monthReduceValue['enable'] == true)
                                    @if($monthly_reduced < 0)
                                        <td>{{ 'N/A' }}</td>
                                    @else
                                        <td>£{{ number_format($monthly_reduced,2) }}</td>
                                    @endif
                                @else 
                                    <td>Not Availble</td>
                                @endif
                            @endforeach
                        @endif
                    </tr>
                    <tr>
                        <td style="text-transform: initial;">Pros and Cons</td>
                        @if(isset($allAvailableSolutionsForReviewPage) && !empty($allAvailableSolutionsForReviewPage))
                             @foreach($allAvailableSolutionsForReviewPage as $viewKey => $viewValue)
                                @if($viewValue['enable'] == true)
                                    <td><a  href="#data" data-solution_type = "{{ $viewValue['title'] }}" data-user_id = "{{ $userInfo->user_id }}" class="btn btn-primary collapsible" ata-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#view_pros_and_cons_list" style="color:white;padding:5px 30px;" data-toggle="collapse">View</a></td>
                                @else
                                    <td></td>
                                @endif
                             @endforeach
                        @endif
                    </tr>
                    <tr>
                        <td>Side by side</td>
                        <td>
                            <a id="get_solution_side_by_side_data" data-user_id="{{ $userInfo->user_id }}" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#compair_solution_open" class="btn btn-primary" style="color:white;padding:5px 30px;">View</a>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    
        </table>
        

</div>

</div>

<script type="text/javascript">
    $(document).on('click','.collapsible',function(e)
    {
        e.preventDefault();
        var user_id = $(this).data('user_id');
        var solutionType = $(this).data('solution_type');
        if(solutionType != "" && user_id != ""){
            $.ajax({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url : "{{ route('user.solution_pros_and_cons') }}",
                method : "POST",
                data : {
                    user_id : user_id,
                    solutionType : solutionType
                },
                dataType : "json",
                success : function(data)
                {
                    if(data != ""){
                        $('#view_pros_and_cons_list').modal('show');
                        $('#load_pros_and_cons_data').html(data);
                    }
                }
            });
        }
    });
</script>

<script type="text/javascript">
    $(document).on('click','#get_solution_side_by_side_data',function(e)
    {
        e.preventDefault();
        var user_id = $(this).data('user_id');
        if(user_id != ""){
            $.ajax({
                 headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url : "{{ route('user.get_compair_list') }}",
                method : "POST",
                data : {
                    user_id : user_id
                },
                dataType : "json",
                success : function(data)
                {
                    $('#load_compair_data').html(data);
                }
            });
        }
    });
</script>