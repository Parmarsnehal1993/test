


<style type="text/css">    
    .theme-overflow to .mt-0 .theme-overflow {
        top: 30px;
        min-height: 400px;
        position: relative;
        margin-right: 0px;
        padding-right: 20px;
        
    }
    @media (width:1920px){
    	#income_chart{
    		margin-top:0px;
    	}
    	.theme-overflow {
    	    top: 0px;
    	    min-height: 560px;
    	}	
    }
    @media (min-width:1366px){
        #outgoing.modal .modal-dialog, #income_modal.modal .modal-dialog {
            width: 95% !important;
            max-width: 95%;
            min-height: 110vh !important;
            /*margin: 60px auto;*/
            transform: translate(0px) !important;
            top: 0px;
        }
        #outgoing.modal .modal-dialog{
            min-height: 200vh !important;
        }
        #outgoing.modal .modal-content, #income_modal.modal .modal-content {
            top: 20px;
            bottom: 20px;
        }   
    }
    #income_chart{margin-top:30px;}
    .form-group.form-inline label {
    max-width: calc(100% - 130px);
    font-size: 14px;
}
#outgoing .form-group.form-inline {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    text-align: left;
    justify-content: flex-start;
}
#outgoing .form-group.form-inline label {
    max-width: 100%;
    font-size: 14px;
    text-align: left;
    justify-content: flex-start;
    min-width: 150px;
}
#outgoing .form-group.form-inline .form-control {
    min-width: 100%;
    max-width: 100%;
    border-radius: 0px;
}
span.rule {
    font-size: 12px;
    margin-left: 10px;
    text-align: center;
    color:#797979;
}
.col-table{
    width: 100%;
    font-size: 14px;
}
.col-table td{
    text-align:center;
}
#outgoing .col-table td {
    text-align: right;
    width: 150px;
}

.col-table td:first-child {
    min-width: 100px;
    text-align: left !important;
}
.col-table h4 {
    font-size: 14px;
}
.col-table1 td {
    text-align: right;
    width: 140px;
}

.w-30{
    max-width:30%
}
</style>
<div class="row">
    <div class="col-6"></div>
    <div class="col-6">
        <div class="card-body">
             @php
                $class = "";
                $totalOutgoings = getTotalOutcome($userInfo->user_id);
                $checkUserBankStatement = checkUserBankStatement($userInfo->user_id);
                if($checkUserBankStatement){
                    $class = "text-success";
                    $text = "AVAILABLE";
                }else{
                    $class = "text-muted";
                    $text = "UNAVAILABLE";
                }
            @endphp
            <h1 class="text-center line-height-auto height-auto {{ $class }}">{{ $text }}</h1>
        </div>
    </div>
</div>  
<div class="plus-sign" id="outgoin-popup"data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#transaction_analysis">
    <img src="{!! asset('images/icons/Plus_Icon@2x.png')!!}" alt="Add" width="30">
</div>
    <div id="transaction_analysis" class="modal fade outgoing" tabindex="-1" role="dialog"
            aria-labelledby="my-modal-title"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content card card-secondary">
                    <div class="modal-header">
                        <div class="card-title" style="color: #004e8a;">
                            Transaction Analysis
                        </div>
                        <button type="button" class="close alert_open">
                            <img src="{!! asset('images/icons/Cross_Icon@2x.png')!!}" alt="Close" class="img-fulid" width="40" height="40">
                        </button>
                    </div>
                        <div class="modal-body">
                            <div class="row">
                                @php $totalTranscationCount = 0; @endphp
                                @if(isset($truelayer_transcation) && !empty($truelayer_transcation)) 
                                    @foreach($truelayer_transcation as $transcationKey => $transcationValue)
                                        @php $countTotalCategoryValue = countTotalCategoryValue($transcationValue); @endphp
                                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4"> 
                                        <div class="form-group form-inline outgoing_rules">
                                            <h4 class="mb-3" style="color: #004e8a;">{{ $transcationKey }}</h4>
                                            <span class="rule" style="color: #004e8a;">£{{ $countTotalCategoryValue }}</span>
                                        </div>
                                            @foreach ($transcationValue as $innerTranscationKey => $innerTranscationValue)
                                                <div class="form-group form-inline outgoing_rules">
                                                    <h4 style="color:#00b0ff;">{{ $innerTranscationValue->truelayer_classification_sub }}</h4>
                                                    <span class="rule">£{{ $innerTranscationValue->truelayer_amount }}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endforeach
                                    
                                @endif
                            </div>
                        </div>
                </div>
            </div>
        </div>
