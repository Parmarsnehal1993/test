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

<div class="card-body d-flex align-items-center justify-content-center">
    @php $tickMarkImage = '';@endphp
    @if(!empty($copy_of_photo_id_answer) && !empty($wage_slip_answer) && !empty($bank_statement_answer) && !empty($tenancy_and_morgage_statement_answer) && !empty($evidence_of_benifits_answer) && !empty($are_we_ok_do_soft_credit_search_answer) && !empty($debts_uploaded_answer))
            @php $tickMarkImage = 'images/TickMarkGreen.png'; @endphp
    @else
        @php $tickMarkImage = 'images/CrossMarkRed.png'; @endphp
    @endif
    <div class="d-flex align-items-center justify-content-center">
        <img src="{!! asset($tickMarkImage) !!}" id="checklist_tick_image" alt="Missing Personal Details" class="img-fluid" style="width:100px;">
    </div>
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
                                        {{-- <tr>
                                            <td>income &amp; Exp.</td>
                                            <td class="text-right">Manual</td>
                                        </tr>
                                        <tr>
                                            <td>Debts</td>
                                            <td class="text-right">Completed</td>
                                        </tr> --}}
                                        <tr>
                                            <td>Copy Of Photo ID</td>
                                            <td class="text-right">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="photo_y" name="Photo" value="YES" @if(isset($copy_of_photo_id_answer) && strtolower($copy_of_photo_id_answer) == 'yes') checked @endif  class="custom-control-input">
                                                    <label class="custom-control-label" for="photo_y">yes</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="photo_n" name="Photo" value="no" @if(isset($copy_of_photo_id_answer) && strtolower($copy_of_photo_id_answer) == 'no') checked @endif  class="custom-control-input">
                                                    <label class="custom-control-label" for="photo_n">no</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="photo_n_a" name="Photo" value="n/a" @if(isset($copy_of_photo_id_answer) && strtolower($copy_of_photo_id_answer) == 'n/a') checked @endif  class="custom-control-input">
                                                    <label class="custom-control-label" for="photo_n_a">N/A</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>wage Slip</td>
                                            <td class="text-right">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="wage_slide_yes" value="YES" @if(isset($wage_slip_answer) && strtolower($wage_slip_answer) == 'yes') checked @endif  name="wage_slip" class="custom-control-input">
                                                    <label class="custom-control-label" for="wage_slide_yes">yes</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="wage_slide_no" value="NO" @if(isset($wage_slip_answer) && strtolower($wage_slip_answer) == 'no') checked @endif name="wage_slip" class="custom-control-input">
                                                    <label class="custom-control-label" for="wage_slide_no">no</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="wage_slide_n_a" value="n/a" @if(isset($wage_slip_answer) && strtolower($wage_slip_answer) == 'n/a') checked @endif name="wage_slip" class="custom-control-input">
                                                    <label class="custom-control-label" for="wage_slide_n_a">N/A</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Bank Statement:</td>
                                            <td class="text-right">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="bacnk_st_yes" name="bank_st" value="PIC" @if(isset($bank_statement_answer) && ( strtolower($bank_statement_answer) == 'yes' || strtolower($bank_statement_answer) == 'pic') ) checked @endif class="custom-control-input">
                                                    <label class="custom-control-label" for="bacnk_st_yes">yes</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="bacnk_st_no" name="bank_st" value="no" @if(isset($bank_statement_answer) && ( strtolower($bank_statement_answer) == 'no') ) checked @endif class="custom-control-input">
                                                    <label class="custom-control-label" for="bacnk_st_no">No</label>
                                                </div>
                                                {{-- <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="bacnk_st_no" name="bank_st" value="EMAIL" @if(isset($bank_statement_answer) && strtolower($bank_statement_answer) == 'email' || (isset($userAccountScoreData->pdf1) && !empty($userAccountScoreData->pdf1)) || (isset($userAccountScoreData->pdf2) && !empty($userAccountScoreData->pdf2))) checked @endif class="custom-control-input">
                                                    <label class="custom-control-label" for="bacnk_st_no">Email</label>
                                                </div> --}}
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="bacnk_st_n_a" name="bank_st" value="EMAIL" @if(isset($bank_statement_answer) && strtolower($bank_statement_answer) == 'n/a') checked @endif class="custom-control-input">
                                                    <label class="custom-control-label" for="bacnk_st_n_a">N/A</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tenacy and Morgage Statement</td>
                                            <td class="text-right">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="morgage_yes" name="morgage"  value="YES" @if(isset($tenancy_and_morgage_statement_answer) && strtolower($tenancy_and_morgage_statement_answer) == 'yes') checked @endif  class="custom-control-input">
                                                    <label class="custom-control-label" for="morgage_yes">yes</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="morgage_no" name="morgage"  value="NO" @if(isset($tenancy_and_morgage_statement_answer) && strtolower($tenancy_and_morgage_statement_answer) == 'no') checked @endif class="custom-control-input">
                                                    <label class="custom-control-label" for="morgage_no">no</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="morgage_n_a" name="morgage"  value="n/a" @if(isset($tenancy_and_morgage_statement_answer) && strtolower($tenancy_and_morgage_statement_answer) == 'n/a') checked @endif class="custom-control-input">
                                                    <label class="custom-control-label" for="morgage_n_a">N/A</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Evidence Of Benefits</td>
                                            <td class="text-right">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="benefits_yes" value="YES" @if(isset($evidence_of_benifits_answer) && strtolower($evidence_of_benifits_answer) == 'yes') checked @endif name="benifits" class="custom-control-input">
                                                    <label class="custom-control-label" for="benefits_yes">yes</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="benefits_no" name="benifits" value="NO" @if(isset($evidence_of_benifits_answer) && strtolower($evidence_of_benifits_answer) == 'no') checked @endif class="custom-control-input">
                                                    <label class="custom-control-label" for="benefits_no">no</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="benefits_n_a" name="benifits" value="n/a" @if(isset($evidence_of_benifits_answer) && strtolower($evidence_of_benifits_answer) == 'n/a') checked @endif class="custom-control-input">
                                                    <label class="custom-control-label" for="benefits_n_a">N/A</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Debts Updated</td>
                                            <td class="text-right">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="is_debts_yes" name="debts" value="YES" @if(isset($debts_uploaded_answer) && strtolower($debts_uploaded_answer) == 'yes') checked @endif class="custom-control-input">
                                                    <label class="custom-control-label" for="is_debts_yes">yes</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="is_debts_no" value="NO" @if(isset($debts_uploaded_answer) && strtolower($debts_uploaded_answer) == 'no') checked @endif name="debts" class="custom-control-input">
                                                    <label class="custom-control-label" for="is_debts_no">no</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="is_debts_n_a" value="n/a" @if(isset($debts_uploaded_answer) && strtolower($debts_uploaded_answer) == 'n/a') checked @endif name="debts" class="custom-control-input">
                                                    <label class="custom-control-label" for="is_debts_n_a">N/A</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Are We Ok Do soft Creadit Search</td>
                                            <td class="text-right">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="soft_credit_yes" name="soft_credit" class="custom-control-input"  value="YES" @if(isset($are_we_ok_do_soft_credit_search_answer) && strtolower($are_we_ok_do_soft_credit_search_answer) == 'yes') checked @endif>
                                                    <label class="custom-control-label" for="soft_credit_yes">yes</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="soft_credit_no"  value="NO" @if(isset($are_we_ok_do_soft_credit_search_answer) && strtolower($are_we_ok_do_soft_credit_search_answer) == 'no') checked @endif name="soft_credit" class="custom-control-input">
                                                    <label class="custom-control-label" for="soft_credit_no">no</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="soft_credit_n_a"  value="n/a" @if(isset($are_we_ok_do_soft_credit_search_answer) && strtolower($are_we_ok_do_soft_credit_search_answer) == 'n/a') checked @endif name="soft_credit" class="custom-control-input">
                                                    <label class="custom-control-label" for="soft_credit_n_a">N/A</label>
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
                                                <option value="DEBT_UPLOADED">Debt Updated</option>
                                                <option value="OTHER">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <input type="file" class="form-control" style="display: none;" name="Choose_File" id="Choose_File" placeholder="Choose File:" required>
                                            <label id="Choose_File_label" for="Choose_File" class="form-control">Choose File </label>
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
                                             <th>Delete</th>
                                        </tr>
                                        </thead>
                                        <tbody id="dynamic_checklist_data">
                                            @if(!empty($last_data))  
                                                @foreach($last_data as $data)
                                                    @if(!empty($data->imageUrl))
                                                        <tr>
                                                            <td>
                                                                @if($data){{$data->file_name}} @else '' @endif
                                                            </td>
                                                            
                                                            <td>
                                                                @if($data){{$data->checklistType}} @else '' @endif
                                                            </td>
                                                            
                                                            <td>
                                                                @if($data){{$data->source}} @else '' @endif
                                                            </td>

                                                            <td>
                                                                <a href="https://freezecms.co.uk/FREEZE/{{ $data->imageUrl }}" class="text-info" download><img src="https://freezecms.co.uk/public/images/sunglasees.png" width="30" alt="sunglasees" /></a>
                                                            </td>

                                                            <td>
                                                                <a href="#" class="btn btn-success" id="checklist_deleted" data-value="{{ $data->id }}">Delete</a>
                                                            </td>
                                                        </tr>
                                                @endif
                                                @endforeach
                                            @endif

                                            @if(!empty($allPdfData))
                                                @foreach($allPdfData as $allPdfDataey => $allPdfDataValue)
                                                    @if(!empty($allPdfDataValue['pdf1']) && !empty($allPdfDataValue['pdf2']))
                                                        <tr>
                                                            <td>PDF 1</td>
                                                            <td>BANK STATEMENT</td>
                                                            <td>
                                                                {{ str_replace('uploads/', '', $allPdfDataValue['pdf1']) }}
                                                            </td>
                                                            <td>
                                                                <a href="https://freezecms.co.uk/FREEZE/{{ $allPdfDataValue['pdf1'] }}" class="text-info" download><img src="https://freezecms.co.uk/public/images/sunglasees.png" width="30" alt="sunglasees" /></a>
                                                            </td>
                                                            <td>-</td>
                                                        </tr>

                                                        <tr>
                                                            <td>PDF 2</td>
                                                            <td>BANK STATEMENT</td>
                                                            <td>
                                                                {{ str_replace('uploads/', '', $allPdfDataValue['pdf2']) }}
                                                            </td>
                                                            <td>
                                                                <a href="https://freezecms.co.uk/FREEZE/{{ $allPdfDataValue['pdf2'] }}" class="text-info" download><img src="https://freezecms.co.uk/public/images/sunglasees.png" width="30" alt="sunglasees" /></a>
                                                            </td>
                                                            <td>-</td>
                                                        </tr>
                                                        @else
                                                            @if(!empty($allPdfDataValue['pdf1']))
                                                                <tr>
                                                                    <td>PDF 1</td>
                                                                    <td>BANK STATEMENT</td>
                                                                    <td>
                                                                        {{ str_replace('uploads/', '', $allPdfDataValue['pdf1']) }}
                                                                    </td>
                                                                    <td>
                                                                        <a href="https://freezecms.co.uk/FREEZE/{{ $allPdfDataValue['pdf1'] }}" class="text-info" download><img src="https://freezecms.co.uk/public/images/sunglasees.png" width="30" alt="sunglasees" /></a>
                                                                    </td>
                                                                    <td>-</td>
                                                                </tr>
                                                            @endif

                                                            @if(!empty($allPdfDataValue['pdf2']))
                                                                <tr>
                                                                    <td>PDF 2</td>
                                                                    <td>BANK STATEMENT</td>
                                                                    <td>
                                                                        {{ str_replace('uploads/', '', $allPdfDataValue['pdf2']) }}
                                                                    </td>
                                                                    <td>
                                                                        <a href="https://freezecms.co.uk/FREEZE/{{ $allPdfDataValue['pdf2']}}" class="text-info" download><img src="https://freezecms.co.uk/public/images/sunglasees.png" width="30" alt="sunglasees" /></a>
                                                                    </td>
                                                                    <td>-</td>
                                                                </tr>
                                                            @endif
                                                    @endif
                                                @endforeach
                                            @endif

                                            {{-- @if(isset($userAccountScoreData->pdf2) && !empty($userAccountScoreData->pdf2))
                                                <tr>
                                                    <td>PDF 2</td>
                                                    <td>BANK STATEMENT</td>
                                                    <td>-</td>
                                                    <td>
                                                        <a href="{{ '../../../FREEZE/'.$userAccountScoreData->pdf2 }}" class="text-info" download><img src="https://freezecms.co.uk/pusunglasees.30" alt="sunglasees" /></a>
                                                    </td>
                                                     <td>
                                                        <a href="#" class="btn btn-success" id="checklist_deleted" data-value="{{ $data->id }}">Delete</a>
                                                    </td>
                                                </tr>
                                            @endif --}}

                                            @if(isset($userDebtsData) && !empty($userDebtsData))
                                                @foreach($userDebtsData as $userDebtsDataKey => $userDebtsDataValue)
                                                    @if(!empty($userDebtsDataValue->imageUrl))
                                                        <tr>
                                                            <td>{{ $userDebtsDataValue->lender }}</td>
                                                            <td>Debt Uploaded</td>
                                                            <td>Manual</td>
                                                            <td> 
                                                                <a href="{{ $_SERVER['SERVER_NAME'].'/FREEZE/'.$userDebtsDataValue->imageUrl }}" class="text-info" download><img src="https://freezecms.co.uk/pusunglasees.30" alt="sunglasees" /></a>
                                                            </td>
                                                            <td>
                                                                <a href="#" class="btn btn-success" id="checklist_deleted" data-value="{{ $data->id }}">Delete</a>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            @endif
                                            {{-- <div id="dynamic_checklist_data"></div> --}}
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
                            var successImage = "{!! asset('images/TickMarkGreen.png') !!}";
                            var errorImage = "{!! asset('images/CrossMarkRed.png') !!}";
                            var messageIcon = 'error';
                            if (data == 'success') {
                                $('#checklist_tick_image').attr('src', successImage);
                                var message = 'Data Saved Successfully';
                                var messageIcon = 'success';
                            } else if (data == 'CrossMarkRed') {
                                $('#checklist_tick_image').attr('src', errorImage);
                                var message = 'Data Save Successfully';
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

                    $('#file_name').val('');
                    $('#file_type').prop('selectedIndex',0);
                    $('#Choose_File').val('');
                    //$('#Choose_File_label').html('');

                    if (data) {
                        var message = 'Data Saved Successfully';
                        var messageIcon = 'success';
                    } else {
                        var message = 'something wrong please try again';
                    }
                    swal(message, {
                        icon: messageIcon,
                    });
                    //location.reload();

                    $.ajax({
                        url: '{{ route('get_single_updated_checklist_data') }}', 
                        method:'get',
                        data:{
                            id:data
                        },
                        dataType:'json',
                        success:function(response)
                        {
                            $('#dynamic_checklist_data').append(response);
                        }
                    });
                }
            });
        });
    });
</script>

<script>
    $(document).on('click','#checklist_deleted',function(e){
        e.preventDefault();
        var id = $(this).attr('data-value');

        if(confirm('Are you sure to remove this record ?'))
        {
            $.ajax({
                url : '{{ route('checklist_deleted') }}',
                method : 'get',
                data : {id : id},
                dataType : 'json',
                success : function(data)
                {
                    var messageIcon = 'error';
                    if (data == 'success') {
                    var message = 'CheckList Deleted Succesfully';
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