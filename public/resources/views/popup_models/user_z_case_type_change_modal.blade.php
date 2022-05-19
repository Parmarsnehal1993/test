 {{-- common model code start here --}}
 <div id="user_z_case_type_change_model" class="modal fade show entercase"  tabindex="-1" role="dialog" aria-labelledby="my-modal-title">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document" style="height: auto;min-height: auto !important;">
        <div class="modal-content card card-secondary">
            <div class="modal-header">
                <h1 class="modal-title">Are You Sure you want Change Status?</h1>
            </div>
            <div class="modal-footer justify-content-start" style="padding: 20px 20px 0px;">
                <div class="buttons width-100 justify-content-between">
                    <a href="'.route('change-status-dmppacknc',[$data->user_id,'DMP Pack N C']).'" id="user_zcasetype_route" class="btn btn-outline-primary">Yes</a>
                    
                    <a href="javascript:void(0)" class="btn btn-outline-primary" data-dismiss="modal" id="modal_hide">No</a>
                </div>
            </div>
        </div>
        <div class="modal-footer mt-4 mb-4 text-danger justify-content-center">
            <a href="javascipt:void(0)" id="btn_hide" class="send_iva btn btn-outline-info" style="padding: 6px 30px; display: none;" data-dismiss="modal">Send</a>
        </div>
    </div>
</div>
{{-- common model code end here --}}

{{-- restore case model code start here --}}

 <div id="user_case_restore" class="modal fade show entercase"  tabindex="-1" role="dialog" aria-labelledby="my-modal-title">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document" style="height: auto;min-height: auto !important;">
        <div class="modal-content card card-secondary">
            <div class="modal-header">
                <h1 class="modal-title">Are You Sure You Want Restore This Case?</h1>
            </div>
            <div class="modal-footer justify-content-start" style="padding: 20px 20px 0px;">
                <div class="buttons width-100 justify-content-between">
                    <a href="" id="user_restore_case_route" class="btn btn-outline-primary">Yes</a>
                    
                    <a href="javascript:void(0)" class="btn btn-outline-primary" data-dismiss="modal" id="modal_hide">No</a>
                </div>
            </div>
        </div>
        <div class="modal-footer mt-4 mb-4 text-danger justify-content-center">
            <a href="javascipt:void(0)" id="btn_hide" class="send_iva btn btn-outline-info" style="padding: 6px 30px; display: none;" data-dismiss="modal">Send</a>
        </div>
    </div>
</div>

{{-- restore case model code end here --}}