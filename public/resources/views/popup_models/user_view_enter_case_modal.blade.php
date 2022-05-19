{{-- view cas model code start here --}}
<div id="user_view_enter_case_model" class="modal fade entercase"  tabindex="-1" role="dialog" aria-labelledby="my-modal-title">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document" style="height: auto;min-height: auto !important;">
        <div class="modal-content card card-secondary">
            <div class="modal-header">
                <h1 class="modal-title">Are You Sure you want enter this case?</h1>
            </div>
            <div class="modal-footer justify-content-start" style="padding: 20px 20px 0px;">
                <div class="buttons width-100 justify-content-between d-flex">
                    <a href="" id="get_view_case_route" class="btn btn-outline-primary">Yes</a>
                    
                    <a href="javascript:void(0)" class="btn btn-outline-primary" data-dismiss="modal" id="modal_hide">No</a>
                </div>
            </div>
        </div>
        <div class="modal-footer mt-4 mb-4 text-danger justify-content-center">
            <a href="javascipt:void(0)" id="btn_hide" class="btn btn-outline-info" style="padding: 6px 30px; display: none;" data-dismiss="modal">Send</a>
        </div>
    </div>
</div>
{{-- view case model end here --}}



<div id="change_user_z_case_type_common_modal" class="modal fade show entercase" tabindex="-1" role="dialog" aria-labelledby="my-modal-title">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document" style="height: auto;min-height: auto !important;">
        <div class="modal-content card card-secondary">
            <div class="modal-header">
                <h1 class="modal-title">Are You Sure you want Change Status?</h1>
            </div>
            <div class="modal-footer justify-content-start" style="padding: 20px 20px 0px;">
                <div class="buttons width-100 justify-content-between">
                    <a id="change_user_z_case_type_common_modal_a_tag" href="" class="btn btn-outline-primary">Yes</a>
                    <a href="javascript:void(0)" class="btn btn-outline-primary" data-dismiss="modal" id="modal_hide">No</a>
                </div>
            </div>
        </div>
        <div class="modal-footer mt-4 mb-4 text-danger justify-content-center">
            <a href="javascipt:void(0)" id="btn_hide" class="send_iva btn btn-outline-info" style="padding: 6px 30px; display: none;" data-dismiss="modal">Send</a>
        </div>
    </div>
</div>