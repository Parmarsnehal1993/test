@extends('layouts.app')

@section('content')
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
    
    <!-- main content start -->
    <section class="main-content">
    <style>
        .form-group a.d-ib img {
            width: 40%;
            vertical-align: middle;
        }
        .form-group + table tr td img {
            width: 28px;
            margin-left: -10px;
            vertical-align: middle;
        }
        .form-group + table tr .heading{
            text-transform: capitalize;
            font-weight: 900;
            font-size: 16px;
            padding-bottom: 10px;
        }
        .form-group .file-select{
           display: inline-block;
           width: auto !important;
           max-width: 200px;
           border-bottom: 1px solid #a3dee6!important;
           border: none !important;
           border-bottom: 1px solid #a3dee6!important;
           margin-right: 10px;
        }
        .form-group .d-ib,.form-group .font-weight-600,.form-group .tt-c{
            font-weight:600;
            display:inline-block;
            text-transform:capitalize;
            color:#14172c;
        }
    </style>
        <div class="container">
            <!-- included user common detail -->
        @include('user.user_common_details')
        <!-- card details start -->
            <section class="card-details font-bold text-uppercase">
                <div class="row">
                    <div class="table-responsive grid-wrapper">
                        <div class="col-md-4" style="border-right:1px solid #14172c;">
                        <h3>Checklist</h3>
                            <form action="{{ route('user.update_user_checklist') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" id="edit" name="eidt" value="@if(isset($edit)){{ $edit }}@endif">
                                <input type="hidden" id="userId" name="userId" value="{{ $userInfo->user_id }}">

                                <table class="bold-table text-normal small-text has-space form-table">
                                    <tbody>
                                    <tr>
                                        <td>Income & EXp.</td>
                                        <td>manual</td>
                                    </tr>
                                    <tr>
                                        <td>debts:</td>
                                        <td>complete</td>
                                    </tr>
                                    <tr>
                                        <td>copy of photo id</td>
                                        <td><input type="radio" id="photo_y" name="ID" value="YES"
                                                   @if(isset($copy_of_photo_id_answer) && strtolower($copy_of_photo_id_answer) == 'yes') checked @endif>
                                            <label for="photo_y">yes</label>
                                        </td>
                                        <td><input type="radio" id="photo_n" name="ID" value="NO"
                                                   @if(isset($copy_of_photo_id_answer) && strtolower($copy_of_photo_id_answer) == 'no') checked @endif>
                                            <label for="photo_n">no</label>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>wage slip</td>
                                        <td><input type="radio" id="slip_y" name="WAGE_SLIP" value="YES"
                                                   @if(isset($wage_slip_answer) && strtolower($wage_slip_answer) == 'yes') checked @endif>
                                            <label for="slip_y">yes</label>
                                        </td>
                                        <td><input type="radio" id="slip_n" name="WAGE_SLIP" value="NO"
                                                   @if(isset($wage_slip_answer) && strtolower($wage_slip_answer) == 'no') checked @endif>
                                            <label for="slip_n">no</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>bank statement:</td>
                                        <td><input type="radio" id="bank_st_y" name="BANK_STATEMENT" value="YES"
                                                   @if(isset($bank_statement_answer) && strtolower($bank_statement_answer) == 'yes') checked @endif>
                                            <label for="bank_st_y">yes</label>
                                        </td>
                                        <td><input type="radio" id="bank_st_email" name="BANK_STATEMENT" value="EMAIL"
                                                   @if(isset($bank_statement_answer) && strtolower($bank_statement_answer) == 'email' || (isset($userAccountScoreData->pdf1) && !empty($userAccountScoreData->pdf1)) || (isset($userAccountScoreData->pdf2) && !empty($userAccountScoreData->pdf2))) checked @endif>
                                            <label for="bank_st_email">email</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>tenancy and morgage statement</td>
                                        <td><input type="radio" id="tam_y" name="TENANCY_OR_MORTGAGE" value="YES"
                                                   @if(isset($tenancy_and_morgage_statement_answer) && strtolower($tenancy_and_morgage_statement_answer) == 'yes') checked @endif>
                                            <label for="tam_y">yes</label>
                                        </td>
                                        <td><input type="radio" id="tam_n" name="TENANCY_OR_MORTGAGE" value="NO"
                                                   @if(isset($tenancy_and_morgage_statement_answer) && strtolower($tenancy_and_morgage_statement_answer) == 'no') checked @endif>
                                            <label for="tam_n">no</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>evidence of benifits</td>
                                        <td><input type="radio" id="evidence_y" name="EVIDENCE_OF_BENEFITS" value="YES"
                                                   @if(isset($evidence_of_benifits_answer) && strtolower($evidence_of_benifits_answer) == 'yes') checked @endif>
                                            <label for="evidence_y">yes</label>
                                        </td>
                                        <td><input type="radio" id="evidence_n" name="EVIDENCE_OF_BENEFITS" value="NO"
                                                   @if(isset($evidence_of_benifits_answer) && strtolower($evidence_of_benifits_answer) == 'no') checked @endif>
                                            <label for="evidence_n">no</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>DEBTS UPLOADED</td>
                                        <td><input type="radio" id="debts_uploaded_y" name="DEBTS_UPLOADED" value="YES"
                                                   @if(isset($debts_uploaded_answer) && strtolower($debts_uploaded_answer) == 'yes') checked @endif>
                                            <label for="debts_uploaded_y">yes</label>
                                        </td>
                                        <td><input type="radio" id="debts_uploaded_n" name="DEBTS_UPLOADED" value="NO"
                                                   @if(isset($debts_uploaded_answer) && strtolower($debts_uploaded_answer) == 'no') checked @endif>
                                            <label for="debts_uploaded_n">no</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>are we ok do soft credit search</td>
                                        <td><input type="radio" id="we_soft_y" name="SOFT_CREDIT_SEARCH" value="YES"
                                                   @if(isset($are_we_ok_do_soft_credit_search_answer) && strtolower($are_we_ok_do_soft_credit_search_answer) == 'yes') checked @endif>
                                            <label for="we_soft_y">yes</label>
                                        </td>
                                        <td><input type="radio" id="we_soft_n" name="SOFT_CREDIT_SEARCH" value="NO"
                                                   @if(isset($are_we_ok_do_soft_credit_search_answer) && strtolower($are_we_ok_do_soft_credit_search_answer) == 'no') checked @endif>
                                            <label for="we_soft_n">no</label>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="text-center">
                                    <input type="submit" class="btn btn-primary" name="update_user_checklist" style="margin: 0" title="Save Checklist" value="Save">
                                </div>
                            </form>
                            {{-- <div class="text-right">
                                <a class="btn btn-large btn-default-outlined" title="Save">Save</a>
                            </div> --}}
                        </div>
                        <div class="col-md-8">
                            <form action="#" style="margin-left: 60px;margin-top: 40px;">
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group" style="display:inline-block;">
                                            <input type="text" class="form-control" placeholder="Input File Name" style="border-color:#00B0F0;" />
                                        </div>
                                        <table class="bold-table text-normal small-text has-space form-table" width="100%;">
                                            <tr>
                                                <thead>
                                                    <th class="heading">
                                                    File Name</th>
                                                    <th class="heading">
                                                    File Type</th>
                                                </thead> 
                                            </tr>
                                            <tr>
                                                <td>Photo ID</td>
                                                <td>ID</td>
                                            </tr>
                                            <tr>
                                                <td>Wage Slip</td>
                                                <td>Wage Slip</td>
                                            </tr>
                                            <tr>
                                                <td>PDF1</td>
                                                <td>Bank Statement</td>
                                            </tr>
                                            <tr>
                                                <td>PDF2</td>
                                                <td>Bank Statement</td>
                                            </tr>
                                            <tr>
                                                <td>Barclays</td>
                                                <td>Debt</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" style="display:inline-block;">
                                            <select name="File Type" id="file_type" placeholder="File Type" class="btn-tertiary-outlined file-select">
                                                    <option value="File Type" selected>File Type</option>
                                                    <option value="Debts">Debts</option>
                                                    <option value="ID">ID</option>
                                                    <option value="Wage Slip">Wage Slip</option>
                                                    <option value="Bank Stetement">Bank Stetement</option>
                                                    <option value="Tenancy or Morgage Statement">Tenancy or Morgage Statement</option>
                                                    <option value="Benifits">Benifits</option>
                                                    <option value="Other">Other</option>
                                            </select>
                                            <a href="#" class="d-ib font-weight-600 tt-c" style="display:inline-block;font-weight:600;text-transform:capitalize">
                                                <img src="https://freezecms.co.uk/public/images/plus.png" alt="add" />
                                                Add
                                            </a>
                                        </div>
                                        <table class="bold-table text-normal small-text has-space form-table" width="100%;">
                                            <tr>
                                                <thead>
                                                    <th class="heading">
                                                    Source</th>
                                                    <th class="heading">
                                                    View</th>
                                                </thead> 
                                            </tr>
                                            <tr>
                                                <td>APP</td>
                                                <td>
                                                <a href="#" class="db">
                                                    <img src="https://freezecms.co.uk/public/images/sunglasees.png" alt="sunglasees" />
                                                </a>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>APP</td>
                                                <td>
                                                <a href="#" class="db">
                                                    <img src="https://freezecms.co.uk/public/images/sunglasees.png" alt="sunglasees" />
                                                </a>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>APP</td>
                                                <td>
                                                <a href="#" class="db">
                                                    <img src="https://freezecms.co.uk/public/images/sunglasees.png" alt="sunglasees" />
                                                </a>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>APP</td>
                                                <td>
                                                <a href="#" class="db">
                                                    <img src="https://freezecms.co.uk/public/images/sunglasees.png" alt="sunglasees" />
                                                </a>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Manual</td>
                                                <td>
                                                <a href="#" class="db">
                                                    <img src="https://freezecms.co.uk/public/images/sunglasees.png" alt="sunglasees" />
                                                </a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </form>
                        </div>
                        {{-- <div class="col-md-6">
                            <table class="bold-table text-normal small-text has-space form-table">
                                <tbody>
                                    <tr>
                                        <td>Account score</td>
                                        <td>
                                            <a href="#" class="text-info">sfs</a>
                                        </td>
                                        <td>
                                            <a href="#" class="text-info">standard</a>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            &nbsp;
                                        </td>
                                        <td>
                                            &nbsp;
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            &nbsp;
                                        </td>
                                        <td>
                                            &nbsp;
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            &nbsp;
                                        </td>
                                        <td>
                                            &nbsp;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            &nbsp;
                                        </td>
                                        <td>
                                            &nbsp;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ACcount score</td>
                                        <td></td>
                                        <td>
                                            <a href="#" class="text-info">standard</a>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div> --}}
                    </div>
                </div>
            </section>
            <!-- card details end -->
        </div>
    </section>
@endsection