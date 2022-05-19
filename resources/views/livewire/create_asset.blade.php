<div wire:ignore.self id="exampleModal" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="my-modal-title">
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
                                <label for="name">Display Name: <span style="color:red">*</span></label>
                                <input type="text" class="form-control" id="exampleFormControlInput2"
                                    wire:model="display_name" placeholder="Enter display_name"
                                    value="@if (isset($asset->display_name)) {{ $asset->display_name }} @endif">
                                @error('display_name') <span
                                    class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-center">
                <div class="form-group">
                    <input type="submit" name="submit" wire:click.prevent="store()"
                        class="text-center btn btn-outline-info float-left btn-large insert_data">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
{{-- <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Name</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Name"
                            wire:model="name">
                        @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput2">display_name </label>
                        <input type="text" class="form-control" id="exampleFormControlInput2"
                            wire:model="display_name" placeholder="Enter display_name">
                        @error('display_name') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Save
                    changes</button>
            </div>
        </div>
    </div>
</div> --}}
