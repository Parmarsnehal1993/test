@php

        $loginUserData = Auth::user();

        unset($loginUserData->password);

        $loginUser = $loginUserData;

@endphp



@php

        $copy_of_photo_id_answer = '';

        $copy_of_photo_id_image_url = '';

        $wage_slip_answer = '';

        $wage_slip_image_url = '';

        $bank_statement_answer = '';

        $bank_statement_image_url = '';

        $tenancy_and_morgage_statement_answer = '';

        $tenancy_and_morgage_statement_image_url = '';

        $evidence_of_benifits_answer = '';

        $evidence_of_benifits_image_url = '';

        $are_we_ok_do_soft_credit_search_answer = '';

        $are_we_ok_do_soft_credit_search_image_url = '';

        $debts_uploaded_answer = '';

        $debts_uploaded_image_url = '';

@endphp

    @if(isset($userChecklist['data']) && !empty($userChecklist['data']))

        @foreach($userChecklist['data'] as $userChecklistKey => $userChecklistValue)

            @switch($userChecklistValue->checklistType)

                @case('ID')

                    @php

                    $copy_of_photo_id_answer = $userChecklistValue->answer;

                    $copy_of_photo_id_image_url = $userChecklistValue->imageUrl;

                    @endphp

                    @break



                @case('TENANCY_OR_MORTGAGE')

                    @php

                    $tenancy_and_morgage_statement_answer = $userChecklistValue->answer;

                    $tenancy_and_morgage_statement_image_url = $userChecklistValue->imageUrl;

                    @endphp

                    @break



                @case('DEBTS_UPLOADED')

                    @php

                    $debts_uploaded_answer = $userChecklistValue->answer;

                    $debts_uploaded_image_url = $userChecklistValue->imageUrl;

                    @endphp

                    @break



                @case('EVIDENCE_OF_BENEFITS')

                    @php

                    $evidence_of_benifits_answer = $userChecklistValue->answer;

                    $evidence_of_benifits_image_url = $userChecklistValue->imageUrl;

                    @endphp

                    @break



                @case('BANK_STATEMENT')

                    @php

                    $bank_statement_answer = $userChecklistValue->answer;

                    $bank_statement_image_url = $userChecklistValue->imageUrl;

                    @endphp

                    @break



                @case('SOFT_CREDIT_SEARCH')

                    @php

                    $are_we_ok_do_soft_credit_search_answer = $userChecklistValue->answer;

                    $are_we_ok_do_soft_credit_search_image_url = $userChecklistValue->imageUrl;

                    @endphp

                    @break



                @case('WAGE_SLIP')

                    @php

                    $wage_slip_answer = $userChecklistValue->answer;

                    $wage_slip_image_url = $userChecklistValue->imageUrl;

                    @endphp

                    @break

                    @default

            @endswitch

        @endforeach

    @endif





<div class="card-body">

    <table class="table mb-0 td-plr-0">

        <tr>

            <td>

                Debts:

            </td>
             @php

            $id = $userInfo->user_id;

            $checked_debts = getDebtAmount($id);

            @endphp

            <td class="text-right">

                <div class="custom-control custom-radio custom-control-inline">

                    <input type="radio" id="yes" name="Debts" class="custom-control-input">

                    <label class="custom-control-label" for="yes">yes</label>

                </div>

                <div class="custom-control custom-radio custom-control-inline">

                    <input type="radio" id="no" name="Debts" class="custom-control-input">

                    <label class="custom-control-label" for="no">no</label>

                </div>

            </td>

        </tr>

        <tr>

            <td>

                Wage Slip:

            </td>

            <td class="text-right">

                <div class="custom-control custom-radio custom-control-inline">

                    <input type="radio" id="wage_yes" name="Wage_slip" value="YES" @if(isset($wage_slip_answer) && strtolower($wage_slip_answer) == 'yes') checked @endif class="custom-control-input">

                    <label class="custom-control-label" for="wage_yes">yes</label>

                </div>

                <div class="custom-control custom-radio custom-control-inline">

                    <input type="radio" id="wage_yes_no" name="Wage_slip" value="No" @if(isset($wage_slip_answer) && strtolower($wage_slip_answer) == 'no') checked @endif  class="custom-control-input">

                    <label class="custom-control-label" for="wage_yes_no">no</label>

                </div>

            </td>

        </tr>

        <tr>

            <td>

                Bank Statement:

            </td>

            <td class="text-right">

                <div class="custom-control custom-radio custom-control-inline">

                    <input type="radio" id="bank_statement_yes" name="bank_statement" value="PIC" @if(isset($bank_statement_answer) && ( strtolower($bank_statement_answer) == 'yes' || strtolower($bank_statement_answer) == 'pic') ) checked @endif class="custom-control-input">

                    <label class="custom-control-label" for="bank_statement_yes">yes</label>

                </div>

                <div class="custom-control custom-radio custom-control-inline">

                    <input type="radio" id="bank_statement_no" name="bank_statement" value="EMAIL" @if(isset($bank_statement_answer) && strtolower($bank_statement_answer) == 'email' || (isset($userAccountScoreData->pdf1) && !empty($userAccountScoreData->pdf1)) || (isset($userAccountScoreData->pdf2) && !empty($userAccountScoreData->pdf2))) checked @endif class="custom-control-input">

                    <label class="custom-control-label" for="bank_statement_no">Email</label>

                </div>

            </td>

        </tr>

    </table>

</div>





<div class="plus-sign" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#Checklist">

    <img src="{!! asset('images/icons/Plus_Icon@2x.png')!!}" alt="Add" width="30">

</div>





<div id="Checklist" class="modal fade Checklist" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" style="padding-right: 16px;">

    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

        <div class="modal-content card card-secondary">

           <div class="overflow-y-auto">
                <div class="modal-header">
               
                    <div class="card-title">
               
                        Check List
               
                    </div>
               
                    <button type="button" class="close alert_open">
               
                    <img src="{!! asset('images/icons/Cross_Icon@2x.png')!!}" alt="Close" class="img-fulid" width="40" height="40">
               
                    </button>
               
                </div>
               
                <div class="modal-body">
               
                    <div class="row">
               
                        <div class="col-md-5">
               
                             <form action="#" method="post"  class="check-data-form" enctype="multipart/form-data">
               
                                @csrf
               
                                <input type="hidden" id="edit" name="eidt" value="@if(isset($edit)){{ $edit }}@endif">
               
                                <input type="hidden" id="userId" name="userId" value="{{ $userInfo->user_id }}">
               
                                <table class="table mb-0 text-left text-primary td-plr-0">
               
                                    <tbody>
               
                                        <tr>
               
                                            <td>
               
                                                income &amp; Exp.
               
                                            </td>
               
                                            <td class="text-right">
               
                                                Manual
               
                                            </td>
               
                                        </tr>
               
                                        <tr>
               
                                            <td>
               
                                                Debts
               
                                            </td>
               
                                            <td class="text-right">
               
                                                Completed
               
                                            </td>
               
                                        </tr>
               
                                        <tr>
               
                                            <td>
               
                                                Copy Of Photo ID
               
                                            </td>
               
                                            <td class="text-right">
               
                                                <div class="custom-control custom-radio custom-control-inline">
               
                                                    <input type="radio" id="photo_y" name="Photo" value="YES" @if(isset($copy_of_photo_id_answer) && strtolower($copy_of_photo_id_answer) == 'yes') checked @endif  class="custom-control-input">
               
                                                    <label class="custom-control-label" for="photo_y">yes</label>
               
                                                </div>
               
                                                <div class="custom-control custom-radio custom-control-inline">
               
                                                    <input type="radio" id="photo_n" name="Photo" value="no" @if(isset($copy_of_photo_id_answer) && strtolower($copy_of_photo_id_answer) == 'no') checked @endif  class="custom-control-input">
               
                                                    <label class="custom-control-label" for="photo_n">no</label>
               
                                                </div>
               
                                            </td>
               
                                        </tr>
               
                                        <tr>
               
                                            <td>
               
                                                wage Slip
               
                                            </td>
               
                                            <td class="text-right">
               
                                                <div class="custom-control custom-radio custom-control-inline">
               
                                                    <input type="radio" id="wage_slide_yes" value="YES" @if(isset($wage_slip_answer) && strtolower($wage_slip_answer) == 'yes') checked @endif  name="wage_slip" class="custom-control-input">
               
                                                    <label class="custom-control-label" for="wage_slide_yes">yes</label>
               
                                                </div>
               
                                                <div class="custom-control custom-radio custom-control-inline">
               
                                                    <input type="radio" id="wage_slide_no" value="NO" @if(isset($wage_slip_answer) && strtolower($wage_slip_answer) == 'no') checked @endif " name="wage_slip" class="custom-control-input">
               
                                                    <label class="custom-control-label" for="wage_slide_no">no</label>
               
                                                </div>
               
                                            </td>
               
                                        </tr>
               
                                        <tr>
               
                                            <td>
               
                                                Bank Statement:
               
                                            </td>
               
                                            <td class="text-right">
               
                                                <div class="custom-control custom-radio custom-control-inline">
               
                                                    <input type="radio" id="bacnk_st_yes" name="bank_st" value="PIC" @if(isset($bank_statement_answer) && ( strtolower($bank_statement_answer) == 'yes' || strtolower($bank_statement_answer) == 'pic') ) checked @endif class="custom-control-input">
               
                                                    <label class="custom-control-label" for="bacnk_st_yes">yes</label>
               
                                                </div>
               
                                                <div class="custom-control custom-radio custom-control-inline">
               
                                                    <input type="radio" id="bacnk_st_no" name="bank_st" value="EMAIL" @if(isset($bank_statement_answer) && strtolower($bank_statement_answer) == 'email' || (isset($userAccountScoreData->pdf1) && !empty($userAccountScoreData->pdf1)) || (isset($userAccountScoreData->pdf2) && !empty($userAccountScoreData->pdf2))) checked @endif class="custom-control-input">
               
                                                    <label class="custom-control-label" for="bacnk_st_no">Email</label>
               
                                                </div>
               
                                            </td>
               
                                        </tr>
               
                                        <tr>
               
                                            <td>
               
                                                Tenacy and Morgage Statement
               
                                            </td>
               
                                            <td class="text-right">
               
                                                <div class="custom-control custom-radio custom-control-inline">
               
                                                    <input type="radio" id="morgage_yes" name="morgage"  value="YES" @if(isset($tenancy_and_morgage_statement_answer) && strtolower($tenancy_and_morgage_statement_answer) == 'yes') checked @endif  class="custom-control-input">
               
                                                    <label class="custom-control-label" for="morgage_yes">yes</label>
               
                                                </div>
               
                                                <div class="custom-control custom-radio custom-control-inline">
               
                                                    <input type="radio" id="morgage_no" name="morgage"  value="NO" @if(isset($tenancy_and_morgage_statement_answer) && strtolower($tenancy_and_morgage_statement_answer) == 'no') checked @endif class="custom-control-input">
               
                                                    <label class="custom-control-label" for="morgage_no">no</label>
               
                                                </div>
               
                                            </td>
               
                                        </tr>
               
                                        <tr>
               
                                            <td>
               
                                                Evidence Of Benifits
               
                                            </td>
               
                                            <td class="text-right">
               
                                                <div class="custom-control custom-radio custom-control-inline">
               
                                                    <input type="radio" id="benefits_yes" value="YES" @if(isset($evidence_of_benifits_answer) && strtolower($evidence_of_benifits_answer) == 'yes') checked @endif name="benifits" class="custom-control-input">
               
                                                    <label class="custom-control-label" for="benefits_yes">yes</label>
               
                                                </div>
               
                                                <div class="custom-control custom-radio custom-control-inline">
               
                                                    <input type="radio" id="benefits_no" name="benifits" value="NO" @if(isset($evidence_of_benifits_answer) && strtolower($evidence_of_benifits_answer) == 'no') checked @endif class="custom-control-input">
               
                                                    <label class="custom-control-label" for="benefits_no">no</label>
               
                                                </div>
               
                                            </td>
               
                                        </tr>
               
                                        <tr>
               
                                            <td>
               
                                                Debts Updated
               
                                            </td>
               
                                            <td class="text-right">
               
                                                <div class="custom-control custom-radio custom-control-inline">
               
                                                    <input type="radio" id="is_debts_yes" name="debts" value="YES" @if(isset($debts_uploaded_answer) && strtolower($debts_uploaded_answer) == 'yes') checked @endif class="custom-control-input">
               
                                                    <label class="custom-control-label" for="is_debts_yes">yes</label>
               
                                                </div>
               
                                                <div class="custom-control custom-radio custom-control-inline">
               
                                                    <input type="radio" id="is_debts_no" value="NO" @if(isset($debts_uploaded_answer) && strtolower($debts_uploaded_answer) == 'no') checked @endif name="debts" class="custom-control-input">
               
                                                    <label class="custom-control-label" for="is_debts_no">no</label>
               
                                                </div>
               
                                            </td>
               
                                        </tr>
               
                                        <tr>
               
                                            <td>
               
                                                Are We Ok Do soft Creadit Search
               
                                            </td>
               
                                            <td class="text-right">
               
                                                <div class="custom-control custom-radio custom-control-inline">
               
                                                    <input type="radio" id="soft_credit_yes" name="soft_credit" class="custom-control-input"  value="YES" @if(isset($are_we_ok_do_soft_credit_search_answer) && strtolower($are_we_ok_do_soft_credit_search_answer) == 'yes') checked @endif>
               
                                                    <label class="custom-control-label" for="soft_credit_yes">yes</label>
               
                                                </div>
               
                                                <div class="custom-control custom-radio custom-control-inline">
               
                                                    <input type="radio" id="soft_credit_no"  value="NO" @if(isset($are_we_ok_do_soft_credit_search_answer) && strtolower($are_we_ok_do_soft_credit_search_answer) == 'no') checked @endif name="soft_credit" class="custom-control-input">
               
                                                    <label class="custom-control-label" for="soft_credit_no">no</label>
               
                                                </div>
               
                                            </td>
               
                                        </tr>
               
                                    </tbody>
               
                                </table>
               
                                <div class="text-center">
               
                                    <a href="#" class="save-form btn btn-outline-info btn-large">Save</a>
               
                                </div>
               
                            </form>
               
                        </div>
               
                        <div class="col-md-6" style="border-left:1.5px solid #008dcc;margin-left: 4.33%;padding-left: 40px;">
               
                            <form action="#" class="image-save-form" method="post" enctype="multipart/form-data">
               
                                <input type="hidden" id="userId" name="userId" value="{{ $userInfo->user_id }}">
               
                                <div class="row">
               
                                    <div class="col-3">
               
                                        <div class="form-group">
               
                                            <input type="text" class="form-control" id="file_name" name="file_name" placeholder="File Name:">
               
                                        </div>
               
                                    </div>
               
                                    <div class="col-3">
               
                                        <div class="form-group">
               
                                            <select class="form-control" id="file_type" name="file_type" required>
               
                                                 <option value="">Select Option</option>
               
                                                <option value="ID">ID</option>
               
                                                <option value="WAGE_SLIP">wage Slip</option>
               
                                                <option value="BANK_STATEMENT">Bank Statement</option>
               
                                                <option value="TENANCY_OR_MORTGAGE">Tenacy / Morgage Statement</option>
               
                                                <option value="EVIDENCE_OF_BENEFITS">Benifits</option>
               
                                                <option value="OTHER">Other</option>
               
                                            </select>
               
                                        </div>
               
                                    </div>
               
                                    <div class="col-4">
               
                                        <div class="form-group">
               
                                            <input type="file" class="form-control" style="display: none;" name="Choose_File" id="Choose_File" placeholder="Choose File:" required>
               
                                            <label for="Choose_File" class="form-control">Choose File </label>
               
                                        </div>
               
                                    </div>
               
                                    <div class="col-2">
               
                                        
               
                                        <button class="bg-transparent border-0 p-0"><img src="{!! asset('images/icons/Plus_Icon@2x.png')!!}" id="admin_checklist_form" alt="Add" width="30"></button>
               
                                    </div>
               
                                </div>
               
                                <div class="row">
               
                                    <table class="table search-table">
               
                                        <thead>
               
                                        <tr>
               
                                            <th>Name </th>
               
                                            <th>Type</th>
               
                                            <th>Source</th>
               
                                            <th>View</th>
               
                                        </tr>
               
                                        </thead>
               
                                        <tbody>
               
                                            @if(!empty($last_data))  
               
                                            @foreach($last_data as $data)
                                                @if(!empty($data->imageUrl))
            
                                                    <tr>
                       
                                                        <td>@if($data){{$data->file_name}} @else '' @endif</td>
                       
                                                        <td>@if($data){{$data->checklistType}} @else '' @endif</td>
                       
                                                        <td>@if($data){{$data->source}} @else '' @endif</td>
                       
                                                        <td>
                       
                                                            <a href="{{ '../../../FREEZE/'.$data->imageUrl }}" class="text-info" download><img src="https://freezecms.co.uk/public/images/sunglasees.png" download  width="30" alt="sunglasees" /></a>
                       
                                                        </td>
                       
                                                    </tr>
                                            @endif
               
                                            @endforeach
               
                                            @endif
               
               
               
                                             @if(isset($userAccountScoreData->pdf2) && !empty($userAccountScoreData->pdf2))
               
                                                    <tr>
               
                                                        <td>PDF 2</td>
               
                                                        <td>BANK STATEMENT</td>
               
                                                        <td>-</td>
               
                                                        <td>
               
                                                            <a href="{{ '../../../FREEZE/'.$userAccountScoreData->pdf2 }}" class="text-info" download><img src="https://freezecms.co.uk/pusunglasees.30" alt="sunglasees" /></a>
               
                                                        </td>
               
                                                    </tr>
               
                                                @endif
               
               
               
                                                @if(isset($userDebtsData) && !empty($userDebtsData))
               
                                                    @foreach($userDebtsData as $userDebtsDataKey => $userDebtsDataValue)
               
                                                        @if(!empty($userDebtsDataValue->imageUrl))
               
                                                            <tr>
               
                                                                <td>{{ $userDebtsDataValue->lender }}</td>
               
                                                                <td>Debt Uploaded</td>
               
                                                                <td>Manual</td>
               
                                                                <td>
               
                                                                    <a href="{{ '../../../FREEZE/'.$userDebtsDataValue->imageUrl }}" class="text-info" download><img src="https://freezecms.co.uk/pusunglasees.30" alt="sunglasees" /></a>
               
                                                                </td>
               
                                                            </tr>
               
                                                        @endif
               
                                                    @endforeach
               
                                                @endif
               
                                        </tbody>
               
                                </table>
               
                                </div>
               
                            </form>
               
                            <div class="modal-footer mt-1 mb-4 clearfix ml-2">
               
                                <a href="javascipt:void(0)" class="btn btn-outline-info float-right btn-large" data-dismiss="modal">Update</a>
               
                            </div>
               
                        </div>
               
                    </div>
               
                </div>
               
           </div>
        </div>

    </div>

</div>


<!-- <div id="Checklist" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

        <div class="modal-content card card-secondary">

            <div class="overflow-y-auto">
                <div class="modal-header">
                
                    <div class="card-title">
                
                        Check List
                
                    </div>
                
                    <button type="button" class="close alert_open"  aria-label="Close">
                
                    <img src="{!! asset('images/icons/Cross_Icon@2x.png')!!}" alt="Close" class="img-fulid" width="40" height="40">
                
                    </button>
                
                </div>
                
                <div class="modal-body">
                
                    <div class="row">
                
                        <div class="col-md-5">
                
                            <form action="#" method="post"  id="check-data-form" enctype="multipart/form-data">
                
                                @csrf
                
                                <input type="hidden" id="edit" name="eidt" value="@if(isset($edit)){{ $edit }}@endif">
                
                                <input type="hidden" id="userId" name="userId" value="{{ $userInfo->user_id }}">
                
                                <table class="table mb-0 text-left text-primary">
                
                                    <tbody>
                
                                        <tr>
                
                                            @php
                
                                            $id = $userInfo->user_id;
                
                                            $available_debts = getDebtAmount($id);
                
                                            $available_exp = getOutgoing($id);
                
                                            $getIncome = getIncome($id);
                
                                            @endphp
                
                                            <td>income & Exp.</td>
                
                                            @if($available_exp == 0 && $getIncome == 0)
                
                                            <td class="text-right">Manual</td>
                
                                            @else
                
                                            <td class="text-right">Completed</td>
                
                                            @endif
                
                                        </tr>
                
                                        <tr>
                
                                            <td>Debts</td>
                
                                            @if($available_debts == 0)
                
                                            <td class="text-right">Manual</td>
                
                                            @else
                
                                            <td class="text-right">Completed</td>
                
                                            @endif
                
                                        </tr>
                
                                        <tr>
                
                                            <td>Copy Of Photo ID</td>
                
                                            <td class="text-right">
                
                                                <div class="custom-control custom-radio custom-control-inline">
                
                                                    <input type="radio" id="photo_y" name="Photo" value="YES" @if(isset($copy_of_photo_id_answer) && strtolower($copy_of_photo_id_answer) == 'yes') checked @endif class="custom-control-input">
                
                                                    <label class="custom-control-label" for="photo_y">yes</label>
                
                                                </div>
                
                                                <div class="custom-control custom-radio custom-control-inline">
                
                                                    <input type="radio" id="photo_n" name="Photo" value="NO"@if(isset($copy_of_photo_id_answer) && strtolower($copy_of_photo_id_answer) == 'no') checked @endif class="custom-control-input">
                
                                                    <label class="custom-control-label" for="photo_n">no</label>
                
                                                </div>
                
                                            </td>
                
                                        </tr>
                
                                        <tr>
                
                                            <td>wage Slip</td>
                
                                            <td class="text-right">
                
                                                <div class="custom-control custom-radio custom-control-inline">
                
                                                    <input type="radio" id="slip_y" name="wage_slip" value="YES" @if(isset($wage_slip_answer) && strtolower($wage_slip_answer) == 'yes') checked @endif class="custom-control-input">
                
                                                    <label class="custom-control-label" for="slip_y">yes</label>
                
                                                </div>
                
                                                <div class="custom-control custom-radio custom-control-inline">
                
                                                    <input type="radio" id="slip_n" name="wage_slip" value="NO" @if(isset($wage_slip_answer) && strtolower($wage_slip_answer) == 'no') checked @endif class="custom-control-input">
                
                                                    <label class="custom-control-label" for="slip_n">no</label>
                
                                                </div>
                
                                            </td>
                
                                        </tr>
                
                                        <tr>
                
                                            <td>Bank Statement:</td>
                
                                            <td class="text-right">
                
                                                <div class="custom-control custom-radio custom-control-inline">
                
                                                    <input type="radio" id="bank_st" name="BANK_STATEMENT" value="PIC" @if(isset($bank_statement_answer) && ( strtolower($bank_statement_answer) == 'yes' || strtolower($bank_statement_answer) == 'pic') ) checked @endif class="custom-control-input">
                
                                                    <label class="custom-control-label" for="bank_st_y">yes</label>
                
                                                </div>
                
                                                <div class="custom-control custom-radio custom-control-inline">
                
                                                    <input type="radio" id="bank_st" name="BANK_STATEMENT" value="EMAIL" @if(isset($bank_statement_answer) && strtolower($bank_statement_answer) == 'email' || (isset($userAccountScoreData->pdf1) && !empty($userAccountScoreData->pdf1)) || (isset($userAccountScoreData->pdf2) && !empty($userAccountScoreData->pdf2))) checked @endif class="custom-control-input">
                
                                                    <label class="custom-control-label" for="bank_st_email">Email</label>
                
                                                </div>
                
                                            </td>
                
                                        </tr>
                
                                        <tr>
                
                                            <td>Tenacy and Morgage Statement</td>
                
                                            <td class="text-right">
                
                                                <div class="custom-control custom-radio custom-control-inline">
                
                                                    <input type="radio" id="tam_y" name="morgage" value="YES" @if(isset($tenancy_and_morgage_statement_answer) && strtolower($tenancy_and_morgage_statement_answer) == 'yes') checked @endif class="custom-control-input">
                
                                                    <label class="custom-control-label" for="evidence_y">yes</label>
                
                                                </div>
                
                                                <div class="custom-control custom-radio custom-control-inline">
                
                                                    <input type="radio" id="tam_n" name="morgage"
                
                                                    value="NO" @if(isset($tenancy_and_morgage_statement_answer) && strtolower($tenancy_and_morgage_statement_answer) == 'no') checked @endif class="custom-control-input">
                
                                                    <label class="custom-control-label" for="tam_n">no</label>
                
                                                </div>
                
                                            </td>
                
                                        </tr>
                
                                        <tr>
                
                                            <td>Evidence Of Benifits</td>
                
                                            <td class="text-right">
                
                                                <div class="custom-control custom-radio custom-control-inline">
                
                                                    <input type="radio" id="evidence_y" name="benifits" value="YES" @if(isset($evidence_of_benifits_answer) && strtolower($evidence_of_benifits_answer) == 'yes') checked @endif class="custom-control-input">
                
                                                    <label class="custom-control-label" for="evidence_y">yes</label>
                
                                                </div>
                
                                                <div class="custom-control custom-radio custom-control-inline">
                
                                                    <input type="radio" id="evidence_n" name="benifits" value="NO" @if(isset($evidence_of_benifits_answer) && strtolower($evidence_of_benifits_answer) == 'no') checked @endif class="custom-control-input">
                
                                                    <label class="custom-control-label" for="evidence_n">no</label>
                
                                                </div>
                
                                            </td>
                
                                        </tr>
                
                                        <tr>
                
                                            <td>Debts Updated</td>
                
                                            <td class="text-right">
                
                                                <div class="custom-control custom-radio custom-control-inline">
                
                                                    <input type="radio" id="debts_uploaded_y" name="debts" value="YES" @if(isset($debts_uploaded_answer) && strtolower($debts_uploaded_answer) == 'yes') checked @endif class="custom-control-input">
                
                                                    <label class="custom-control-label" for="debts_uploaded_y">yes</label>
                
                                                </div>
                
                                                <div class="custom-control custom-radio custom-control-inline">
                
                                                    <input type="radio" id="debts_uploaded_n" name="debts" value="NO" @if(isset($debts_uploaded_answer) && strtolower($debts_uploaded_answer) == 'no') checked @endif class="custom-control-input">
                
                                                    <label class="custom-control-label" for="debts_uploaded_n">no</label>
                
                                                </div>
                
                                            </td>
                
                                        </tr>
                
                                        <tr>
                
                                            <td>Are We Ok Do soft Creadit Search</td>
                
                                            <td class="text-right">
                
                                                <div class="custom-control custom-radio custom-control-inline">
                
                                                    <input type="radio" id="we_soft_y" name="soft_credit" value="YES" @if(isset($are_we_ok_do_soft_credit_search_answer) && strtolower($are_we_ok_do_soft_credit_search_answer) == 'yes') checked @endif class="custom-control-input">
                
                                                    <label class="custom-control-label" for="we_soft_y">yes</label>
                
                                                </div>
                
                                                <div class="custom-control custom-radio custom-control-inline">
                
                                                    <input type="radio" id="we_soft_n" name="soft_credit" value="NO" @if(isset($are_we_ok_do_soft_credit_search_answer) && strtolower($are_we_ok_do_soft_credit_search_answer) == 'no') checked @endif class="custom-control-input">
                
                                                    <label class="custom-control-label" for="we_soft_n">no</label>
                
                                                </div>
                
                                            </td>
                
                                        </tr>
                
                                    </tbody>
                
                                </table>
                
                                <br>
                
                                <br>
                
                                <br>
                
                                <div class="text-center">
                
                                    <a href="#" class="btn btn-outline-info btn-large" id="save-form">Save</a>
                
                                    {{-- <input type="submit" name="submit" class="btn btn-outline-info btn-large"> --}}
                
                                </div>
                
                            </form>
                
                        </div>
                
                        <div class="col-md-6" style="border-left:1.5px solid #008dcc;margin-left: 4.33%;padding-left: 40px;padding-right: 140px;">
                
                            <form action="#" class="image-save-form" method="post"  enctype="multipart/form-data">
                
                                @csrf
                
                                <input type="hidden" id="userId" name="userId" value="{{ $userInfo->user_id }}">
                
                                <div class="form-group">
                
                                    <input type="text" class="form-control" name="file name" name="file_name" id="file_name" placeholder="File Name:">
                
                                </div>
                
                                <div class="form-group">
                
                                    <input type="file" class="form-control" style="display: none;" name="Choose_File" id="Choose_File" placeholder="Choose File:">
                
                                    <label for="Choose_File" class="form-control" style="width: auto;display: inline-block;margin-bottom: 0px;">Choose File</label>
                
                                </div>
                
                                <div class="form-group">
                
                                    <select name="file_type" id="file_type" class="form-control">
                
                                        <option value="Source" selected="selected">Source</option>
                
                                        <option value="ID">ID</option>
                
                                        <option value="WAGE_SLIP">wage Slip</option>
                
                                        <option value="BANK_STATEMENT">Bank Statement</option>
                
                                        <option value="TENANCY_OR_MORTGAGE">Tenacy / Morgage Statement</option>
                
                                        <option value="EVIDENCE_OF_BENEFITS">Benifits</option>
                
                                        <option value="OTHER">Other</option>
                
                                    </select>
                
                                </div>
                
                                <div class="form-group">
                
                                    <input type="submit" name="submit" value="save" class="btn btn-outline-info btn-large">
                
                                </div>
                
                            </form>
                
                            <br>
                
                            <br>
                
                        </div> 
                
                    </div>
                
                </div>
            </div>

        </div>

    </div>

</div> -->



<script type="text/javascript">

         $(document).ready(function(){

            $('.save-form').click(function(){

                var userId = $('#userId').val();

               var photo_id = $('input[name="Photo"]:checked + label').text();

               var wage_slip = $('input[name="wage_slip"]:checked + label').text();

               var bank_statement = $('input[name="bank_st"]:checked + label').text();

               var morgage = $('input[name="morgage"]:checked + label').text();

               var benifits = $('input[name="benifits"]:checked + label').text();

               var debts = $('input[name="debts"]:checked + label').text();

               var soft_credit = $('input[name="soft_credit"]:checked + label').text();

                    $.ajax({ 

                        headers: {

                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                        },

                        url:'{{ route('user.update_user_checklist') }}',

                        method:'Post',

                        data:{

                            userId:userId,

                            photo_id:photo_id,

                            wage_slip:wage_slip,

                            bank_statement:bank_statement,

                            morgage:morgage,

                            benifits:benifits,

                            debts:debts,

                            soft_credit:soft_credit

                        },

                        dataType:'json',

                        success:function(data)

                        {

                        var messageIcon = 'error';

                        if (data == 'success') {

                        var message = 'Data Saved Successfully';

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

        $(document).ready(function(){

            $('.image-save-form').on('submit', function(event){

                event.preventDefault();

                    $.ajax({

                        headers: {

                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                        },

                        url:"{{route('user.update_user_checklist_images')}}",

                        method:"POST",

                        data:new FormData(this),

                        dataType:'JSON',

                        contentType: false,

                        cache: false,

                        processData: false,

                        success:function(data)

                        {

                        var messageIcon = 'error';

                        if (data) {

                        var message = 'Data Saved Successfully';

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

            });

        });

</script>



{{-- {{ URL::to('user/show-checklist-image') }}/+data[i] --}}