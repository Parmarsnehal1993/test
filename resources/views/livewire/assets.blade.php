<div>
    @include('livewire.create_asset')
    @include('livewire.update_asset')

    <div class="col-md-12">
        <div class="card">
            @if (session()->has('message'))
                <div class="alert alert-success" style="margin-top:30px;">x
                    {{ session('message') }}
                </div>
            @endif
            <div class="card-body">
                <a class="btn btn-outline-info btn-bordered-primary" style="float: right;" id="deleteDebtbtn">Delete</a>
                <div class="table-responsive grid-wrapper">
                    <table class="table search-table " id="Assets">
                        <thead>
                            <th>Sr.No
                            </th>
                            <th>Name</th>
                            <th>Display Name</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($assets as $value)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->display_name }}</td>
                                    <td>
                                        <button data-toggle="modal" data-target="#updateModal"
                                            wire:click="edit({{ $value->id }})" class="btn btn-success btn-sm"><i
                                                class="fa fa-pencil" aria-hidden="true"></i></button>
                                        <button wire:click="delete({{ $value->id }})" class="btn btn-danger btn-sm"><i
                                                class="fa fa-trash" aria-hidden="true"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- <table class="table table-bordered mt-5">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Open Form
        </button>
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Dsisplay Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($assets as $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->display_name }}</td>
                    <td>
                        <button data-toggle="modal" data-target="#updateModal" wire:click="edit({{ $value->id }})"
                            class="btn btn-primary btn-sm">Edit</button>
                        <button wire:click="delete({{ $value->id }})" class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table> --}}
</div>
