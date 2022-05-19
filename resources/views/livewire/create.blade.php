<!-- Button trigger modal -->


<!-- Modal -->
<div id="addModel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content card card-secondary">
            <div class="modal-header">
                <div class="card-title">Add Assets</div>
                <button type="button" class="close alert_open" aria-label="Close">
                    <img src="{!! asset('images/icons/Cross_Icon@2x.png') !!}" alt="Close" class="img-fulid" width="40" height="40">
                </button>
            </div>
            <div class="modal-body text-primary">
                <form method="post" action="" id="Assetform" data-parsley-validate="">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="hidden" name="id" id="id">
                                <label for="name">Name: <span style="color:red">*</span></label>
                                <input id="name" class="form-control" type="text" name="name" placeholder="Name"
                                    wire:model="name" required>
                                <span class="text-danger" id="nameError"></span>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="id" id="id">
                                <label for="name">Email: <span style="color:red">*</span></label>
                                <input id="email" class="form-control" type="email" name="email" placeholder="Email"
                                    wire:model="email" required>
                                <span class="text-danger" id="emailError"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-center">
                <div class="form-group">
                    <button class="btn alert-danger" type="button" wire:click.prevent="store()">Save</button>

                </div>
            </div>
        </div>
    </div>
</div>
