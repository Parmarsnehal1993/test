@include('popup_models.user_z_case_type_change_modal')
@include('popup_models.user_view_enter_case_modal')
{{-- @include('user/list_data') --}} 
@php
        $loginUserData = Auth::user();
        unset($loginUserData->password);
        $loginUser = $loginUserData;
        $loginUserType = $loginUser->user_type;
        $viewCaseButtonArr = array(1,3,5,6,7,8,9,10,11);
        $awaitingDocsButtonArr = array(1,3,8,10);
        $awaitingDocsDay1ButtonArr = array(1,3,8);
        $awaitingDocsDay2ButtonArr = array(1,3,8);
        $awaitingDocsDay3ButtonArr = array(1,3,8);
        $awaitingDocsDay4ButtonArr = array(1,3,8);
        $inProcessButtonArr = array(1,3,8,10);
        $inProcessDay1ButtonArr = array(1,3,8);
        $inProcessDay2ButtonArr = array(1,3,8);
        $inProcessDay3ButtonArr = array(1,3,8);
        $inProcessDay4ButtonArr = array(1,3,8);
        $messageDay1ButtonArr = array(1,3,8);
        $messageDay2ButtonArr = array(1,3,8);
        $messageDay3ButtonArr = array(1,3,8);
        $messageDay4ButtonArr = array(1,3,8);
        $notIntrestedButtonArr = array(1,3,5,6,8,10);
        $droButtonArr = array(1,3,5,6,8,10);
        $dncButtonArr = array(1,3,5,6,8,10);
        $noAnswerIvaButtonArr = array(6,1);
        $passBackIvaButtonArr = array(6,1);
        $submittedIvaButtonArr = array(6,1);
        $padiOnMocButtonArr = array(6,1);
        $chasePackButtonArr = array(5,1);
        $noAnswerDmpButtonArr = array(6,1,5);
        $submittedDmpButtonArr = array(5,10);
        $solutinButtonArr = array(7);
        $daQualityButtonArr = array(8,11,9);
        $accountButtonArr = array(9);
        $resolvedButtonArr = array(9);
        $paidCompleteButtonArr = array(9);
        $dmpComplianceButtonArr = array(9,10,11);
        $ivaComplianceButtonArr = array(9,10,11);
        $dmpPackNCButtonArr = array(5,1);
        $dmpNoContactButtonArr = array(5,1);
        $ivaNoContactButtonArr = array(6,1);
        $solutionButtonArr = array(7);
        $viewDebtsButtonArr = array(1,3,5,6,8,10,7,9);
        $complianceButtonArr = array(9,11);
        $restoreButtonArr = array(1,3,5,6,7,8,9,10,11);
@endphp
    {{-- 9765814533 --}}

    {{-- name  => emily bamford
         email => emily_bamford99@hotmail.co.uk
    --}}
    <div class="buttons justify-content-end">
        
            <a href="#" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-case_status="messageday2" data-user_id="{{ $data->user_id }}" class="enter_view_case_btn btn btn-bordered-primary case-btn">View Case</a>

        @if($data_text == "Deleted Case")
            <a href="#" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-user_id="{{ $data->user_id }}" class="restore btn btn-bordered-primary case-btn">Restore</a>
        @endif

        @if(in_array($loginUserType, $awaitingDocsButtonArr) && $data_text != 'Awaiting Docs')
            <a href="#" class="case_status_assign btn btn-bordered-primary case-btn" data-status="Awaiting Docs" data-target="#appointment_model" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-userId="{{ $data->user_id }}" data-userName="{{$data->name}}">Awaiting Docs</a>
        @endif

        @if(in_array($loginUserType,  $inProcessButtonArr) && $data_text != 'In Process')
            <a href = "#" class="case_status_assign btn btn-bordered-primary case-btn" data-status="In Process" data-toggle="modal" data-keyboard="false" data-backdrop="static" data-target="#appointment_model" data-userId="{{ $data->user_id }}" data-userName="{{$data->name}}">In Process</a>
        @endif

        @if(in_array($loginUserType, $messageDay1ButtonArr) && $data_text == 'NEW'  || 
        $data_text == 'COMPLETED APPLICATION' || $data_text == 'QUICK REVIEW' || $data_text == 'quick_review' || $data_text == 'web')
            <a href="#" data-toggle="modal" data-backdrop="static" data-keyboard="false"  data-case_status="messageday1" data-user_id="{{ $data->user_id }}" class="case_status_assign_for_listing btn btn-bordered-primary">Message Day1</a>
        @endif

        @if(in_array($loginUserType,  $notIntrestedButtonArr))
            <a href="" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-case_status="notintrested" data-user_id="{{ $data->user_id }}" class="case_status_changes btn btn-bordered-primary">Not Intrested</a>
        @endif

        @if(in_array($loginUserType,  $dncButtonArr))
            <a href="" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-case_status="DNC" data-user_id="{{ $data->user_id }}" class="case_status_changes btn btn-bordered-primary">D.N.C</a>
        @endif

        @if(in_array($loginUserType,  $droButtonArr))
        <select style="width:112px;" id="change_user_zcase_type_by" name="change_user_zcase_type" class="change_user_zcase_type_by_class btn btn-bordered-primary" data-user_id="{{$data->user_id}}">';
           <option value="">Select Any Option</option>
           <option value="bankruptcy_complete">Bankruptcy</option>
           <option value="debt_relief_order_complete">DRO</option>
           <option value="DNC">DNC</option>
           <option value="administration_order_complete">Admin Order</option>
           <option value="sequestration_complete">Sequestration</option>
        </select>
        @endif
        
        @if(in_array($loginUserType, $messageDay2ButtonArr) && $data_text == 'messageday1')
            <a href="#" data-toggle="modal" data-backdrop="static" data-keyboard="false"  data-case_status="messageday2" data-user_id="{{ $data->user_id }}" class="case_status_assign_for_listing btn btn-bordered-primary">Message Day2</a>
        @endif

        @if(in_array($loginUserType, $messageDay3ButtonArr) && $data_text == 'messageday2')
            <a href="#" data-toggle="modal" data-backdrop="static" data-keyboard="false"  data-case_status="messageday3" data-user_id="{{ $data->user_id }}" class="case_status_assign_for_listing btn btn-bordered-primary">Message Day3</a>
        @endif

        @if(in_array($loginUserType, $messageDay4ButtonArr) && $data_text == 'messageday3')
            <a href="#" data-toggle="modal" data-backdrop="static" data-keyboard="false"  data-case_status="messageday4" data-user_id="{{ $data->user_id }}" class="case_status_assign_for_listing btn btn-bordered-primary">Message Day4</a>
        @endif

        @if(in_array($loginUserType, $inProcessDay1ButtonArr) && $data_text == 'In Process')
            <a href="#" data-toggle="modal" data-backdrop="static" data-keyboard="false"  data-case_status="inprocessday1" data-user_id="{{ $data->user_id }}" class="case_status_assign_for_listing btn btn-bordered-primary">I.P.N.C Day1</a>
        @endif

        @if(in_array($loginUserType, $inProcessDay2ButtonArr) && $data_text == 'inprocessday1')
            <a href="#" data-toggle="modal" data-backdrop="static" data-keyboard="false"  data-case_status="inprocessday2" data-user_id="{{ $data->user_id }}" class="case_status_assign_for_listing btn btn-bordered-primary">I.P.N.C Day2</a>
        @endif

        @if(in_array($loginUserType, $inProcessDay3ButtonArr) && $data_text == 'inprocessday2')
            <a href="#" data-toggle="modal" data-backdrop="static" data-keyboard="false"  data-case_status="inprocessday3" data-user_id="{{ $data->user_id }}" class="case_status_assign_for_listing btn btn-bordered-primary">I.P.N.C Day3</a>
        @endif

        @if(in_array($loginUserType, $inProcessDay4ButtonArr) && $data_text == 'inprocessday3')
            <a href="#" data-toggle="modal" data-backdrop="static" data-keyboard="false"  data-case_status="inprocessday4" data-user_id="{{ $data->user_id }}" class="case_status_assign_for_listing btn btn-bordered-primary">I.P.N.C Day4</a>
        @endif

        @if(in_array($loginUserType, $awaitingDocsDay1ButtonArr) && $data_text == 'Awaiting Docs')
            <a href="#" data-toggle="modal" data-backdrop="static" data-keyboard="false"  data-case_status="awaitingdocsday1" data-user_id="{{ $data->user_id }}" class="case_status_assign_for_listing btn btn-bordered-primary" >A.D.N.C Day1</a>
        @endif

        @if(in_array($loginUserType, $awaitingDocsDay2ButtonArr) && $data_text == 'awaitingdocsday1')
            <a href="#" data-toggle="modal" data-backdrop="static" data-keyboard="false"  data-case_status="awaitingdocsday2" data-user_id="{{ $data->user_id }}" class="case_status_assign_for_listing btn btn-bordered-primary" >A.D.N.C Day2</a>
        @endif

        @if(in_array($loginUserType, $awaitingDocsDay3ButtonArr) && $data_text == 'awaitingdocsday2')
            <a href="#" data-toggle="modal" data-backdrop="static" data-keyboard="false"  data-case_status="awaitingdocsday3" data-user_id="{{ $data->user_id }}" class="case_status_assign_for_listing btn btn-bordered-primary">A.D.N.C Day3</a>
        @endif

        @if(in_array($loginUserType, $awaitingDocsDay4ButtonArr) && $data_text == 'awaitingdocsday3')
            <a href="#" data-toggle="modal" data-backdrop="static" data-keyboard="false"  data-case_status="awaitingdocsday4" data-user_id="{{ $data->user_id }}" class="case_status_assign_for_listing btn btn-bordered-primary">A.D.N.C Day4</a>
        @endif

        @if(in_array($loginUserType, $padiOnMocButtonArr) && $data_text == "SENT TO IP")
            <a href="" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-case_status="Paid on MOC" data-user_id="{{ $data->user_id }}"  class="case_status_changes btn btn-bordered-primary" data-status="paid on MOC">paid on Moc</a>
        @endif

        @if(in_array($loginUserType, $noAnswerIvaButtonArr) && $data_text == "SENT TO IP")
            <a href = "#" class="btn btn-bordered-primary case-btn case_status_assign" data-status="No Answer IVA" data-target="#appointment_model" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-userId="{{ $data->user_id }}" data-userName="'.$data->name.'">No Answer IVA</a>
        @endif

        @if(in_array($loginUserType, $passBackIvaButtonArr) && $data_text == "SENT TO IP")
            <a href = "#" class="btn btn-bordered-primary case-btn case_status_assign" data-status="Pass Back IVA" data-target="#appointment_model" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-userId="{{ $data->user_id }}" data-userName="'.$data->name.'">Pass Back IVA</a>
        @endif 

        @if(in_array($loginUserType, $submittedIvaButtonArr) && $data_text == 'Paid on MOC' || $data_text == 'SENT TO IP')
            <a href="#" class="btn btn-bordered-primary get_submitted_iva text-success" data_status_id="{{ $data->user_id }}">submitted IVA</a>
        @endif

        @if(in_array($loginUserType, $submittedDmpButtonArr) && $data_text == 'SEND TO DMP PROVIDER')
            <a href="#" class="text-success get_submitted_dmp btn btn-bordered-primary" data_status_id="{{ $data->user_id }}">submitted DMP</a>
        @endif

        @if(in_array($loginUserType, $solutinButtonArr) && $data_text != 'solution')
            <a class="btn btn-bordered-primary viewUserSolution" data-user_id="{{ $data->user_id }}">Solution</a>
        @endif
        
        @if(in_array($loginUserType, $daQualityButtonArr) && $data_text == 'da_quality')
            <a class="btn btn-bordered-primary da_quality_popup" data-status-id="{{ $data->user_id }}">DA Quality</a>
        @endif
        
        @if(in_array($loginUserType, $accountButtonArr) && $data_text == "invoice")
            <a href="" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#account_popup" class="btn btn-bordered-primary getAccount" data_status_id="{{ $data->user_id }}">Account</a>
        @endif

        @if(in_array($loginUserType, $resolvedButtonArr) && $data_text == "complaints")
            <a class="btn btn-bordered-primary resolved" data-status-id="{{ $data->user_id }}">Resolved</a>
        @endif

        @if(in_array($loginUserType, $paidCompleteButtonArr) && $data_text == "Complete")
            <a class="btn btn-bordered-primary case_paid" data-toggle="modal" data-target="#paid_case_list" data-backdrop="static" data-keyboard="false" data-status-id="{{ $data->user_id }}">Paid/complete</a>
        @endif

        @if(in_array($loginUserType,$chasePackButtonArr) && $data_text == 'SEND TO DMP PROVIDER' || $data_text == 'dmp draft')
            <a href = "#" class="btn btn-bordered-primary case-btn case_status_assign" data-status="Chase Pack" data-toggle="modal" data-keyboard="false" data-backdrop="static" data-target="#appointment_model" data-userId="{{$data->user_id}}" data-userName="{{$data->name}}">Chase Pack</a>
        @endif

        @if(in_array($loginUserType,$noAnswerDmpButtonArr) && $data_text == 'SEND TO DMP PROVIDER' || $data_text == 'dmp draft')
            <a href = "#" class="btn btn-bordered-primary case-btn case_status_assign" data-status="No Answer DMP" data-target="#appointment_model" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-userId="{{ $data->user_id }}" data-userName="'.$data->name.'">No Answer DMP</a>
        @endif

        @if(in_array($loginUserType, $dmpComplianceButtonArr) && $data_text == 'DMP Compliance' || $data_text == 'submitted DMP')
            <a class="btn btn-bordered-primary dmp_complince" data-toggle="modal" data-target="" data-backdrop="static" data-keyboard="false" data-status-id="{{ $data->user_id }}">DMP compliance</a>
        @endif

        @if(in_array($loginUserType, $ivaComplianceButtonArr) && $data_text == 'IVA Compliance' || $data_text == 'submitted IVA')
            <a class="btn btn-bordered-primary iva_complince" data-toggle="modal" data-target="" data-backdrop="static" data-keyboard="false" data-status-id="{{ $data->user_id }}">IVA compliance</a>
        @endif

        @if(in_array($loginUserType, $dmpPackNCButtonArr) && $data_text == "Chase Pack")
             <a href="#" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-case_status="DMP Pack N C" data-user_id="{{ $data->user_id }}" class="case_status_changes btn btn-bordered-primary">DMP Pack N C</a>
             
        @endif 

        @if(in_array($loginUserType, $dmpNoContactButtonArr) && $data_text == 'No Answer DMP')
            <a href="#" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#dmp_no_contact{{ $data->user_id }}" class="btn btn-bordered-primary case-btn">DMP No Contact</a>
         @endif

        @if(in_array($loginUserType, $viewDebtsButtonArr))
            <a class="btn btn-bordered-primary viewUserDebtsFromList" data-user_id="{{ $data->user_id }}" data-status="view debts"  data-toggle="modal" data-keyboard="false" data-backdrop="static">view debts</a>
        @endif 

        @if(in_array($loginUserType, $ivaNoContactButtonArr) && $data_text == "No Answer IVA")
             <a href="#" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-case_s3tatus="Paid on MOC" data-user_id="{{ $data->user_id }}"  class="case_status_changes btn btn-bordered-primary" data-status="IVA No Contact">IVA No Contact</a>
        @endif

        @php 
        $data_compliance = DB::table('user_compliance')->where('user_id',$data->user_id)->get()->last();
        @endphp
        @if(!empty($data_compliance))
            @if(in_array($loginUserType, $complianceButtonArr) && $data_compliance->is_compliance == 'DMP')
                <a class="btn btn-bordered-primary getComplinceDmp"  data-toggle="modal" data-target="" data-backdrop="static" data-keyboard="false" data-status-id="{{ $data->user_id }}">Compliance</a>
            @elseif (in_array($loginUserType, $complianceButtonArr) && $data_compliance->is_compliance == 'IVA')
                <a class="btn btn-bordered-primary getComplinceIva"  data-toggle="modal" data-target="" data-backdrop="static" data-keyboard="false" data-status-id="{{ $data->user_id }}">Compliance</a>
            @endif
        @endif
        
    </div>
<script>
    $(document).on('click','.enter_view_case_btn',function(e){
        e.preventDefault();

        var case_status = $(this).data('case_status');
        var user_id = $(this).data('user_id');
        
        var view_case_route = '{{ URL::to('user/view/') }}/'+user_id;
        $('#get_view_case_route').attr('href',view_case_route);
        $('#user_view_enter_case_model').modal('show');
    });
</script>

<script>
    $(document).on('click','.case_status_assign_for_listing',function(e){
        e.preventDefault();
        var case_status = $(this).data('case_status');
        var user_id = $(this).data('user_id');
        var user_zcasetype_route = '{{ URL::to('user/change-status-day') }}/'+user_id+'/'+case_status;
       
        $('#user_zcasetype_route').attr('href',user_zcasetype_route);
        $('#user_z_case_type_change_model').modal('show');
    });
</script>


<script type="text/javascript">
    $(document).on('click','.case_status_changes',function(){
        var case_status = $(this).data('case_status');
        var user_id = $(this).data('user_id');

        var user_zcasetype_route = '{{ URL::to('user/change-status') }}/'+user_id+'/'+case_status;
        $('#user_zcasetype_route').attr('href',user_zcasetype_route);
        $('#user_z_case_type_change_model').modal('show');


    });
</script>


<script>
 $(document).on('change', '.change_user_zcase_type_by_class', function(){
    //   var js_selected_case_status = $('.change_user_zcase_type_by_class :selected').val();
        var js_selected_case_status = $(this).val();
        // alert(js_selected_case_status);
       var js_selected_case_status_user_id = $(this).attr('data-user_id');
       
        var js_status_url = '{{ route("change_case_status_by_selected_status", [":user_id", ":case_status"]) }}';
        js_status_url = js_status_url.replace(':user_id', js_selected_case_status_user_id);
        js_status_url = js_status_url.replace(':case_status', js_selected_case_status);
        
        $('#change_user_z_case_type_common_modal_a_tag').attr('href', '');
        $('#change_user_z_case_type_common_modal_a_tag').attr('href', js_status_url);
        $('#change_user_z_case_type_common_modal').modal('show');
        /*alert(' js_selected_case_status => ' + js_selected_case_status + ' js_selected_case_status_user_id => ' + js_selected_case_status_user_id + ' || js_status_url => ' + js_status_url);
        return false;*/
    });
</script>

<script type="text/javascript">
    $(document).on('click','.restore',function(e)
    {
        e.preventDefault();
        var user_id = $(this).data('user_id');
        var user_zcasetype_route = '{{ URL::to('user/restore_case') }}/'+user_id;
        $('#user_restore_case_route').attr('href',user_zcasetype_route);
        $('#user_case_restore').modal('show');
    });
</script>