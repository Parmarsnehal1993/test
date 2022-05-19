@extends('layouts.app')
@section('content')

    <div>
        <section>
            @include('livewire.create')
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        @if (session()->has('message'))
                            <div class="alert alert-success">{{ $message }}</div>
                        @endif
                        <div class="card">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_asset">
                                Launch demo modal
                            </button>
                            <div class="card-header">
                                <h1>All Data</h1>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($profile as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        @livewireScripts
        <script>
            window.on('Data', () => {
                $('#addModel').modal('hide');
            })
            // window.on('Data', () => {
            //     $('#add_asset').modal('hide');
            // });
        </script>
    @endsection
