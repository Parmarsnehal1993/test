@extends('layouts.app')
@section('content')
    <style>
        .app-radio input[type="checkbox"] {
            opacity: 1;
            -webkit-appearance: checkbox;
            width: 15px;
            height: 15px;
            float: none;
        }

        .modal-content {
            bottom: 236px;
        }

        .form-inline label {
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: right;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            margin-bottom: 0;
        }

        .parsley-errors-list {
            color: red;
        }

    </style>
    {{-- <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    @livewireStyles
    <div id="app">
        <main class="py-4 text-capitalize" style="padding-top: 0px !important;">
            <section class="main-content">
                <div class="row">
                    <h1 class="mt--100" id="totalDebtsAmount">Assets</h1>
                </div>
                <section class="card-details">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-12">
                            <div>
                                <div
                                    class="buttons float-right float-lg-left float-md-left float-xl-right small-buttons mb-3 mt-3">
                                    {{-- <a href="#" class="btn btn-outline-info btn-bordered-primary" id="create_asset"><i
                                            class="fa fa-file-excel"></i>Add Assets</a> --}}
                                    <button type="button" class="btn btn-outline-info btn-bordered-primary"
                                        data-toggle="modal" data-target="#exampleModal">
                                        Add Asset
                                    </button>
                                    {{-- @if (session()->has('message'))
                                        <div class="alert alert-success">
                                            {{ session('message') }}
                                        </div>
                                    @endif --}}

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @livewire('assets')
                    </div>
                    {{-- <div class="row">
                        @livewire('assets')
                    </div> --}}
                </section>
            </section>
        </main>
    </div>
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>Laravel Livewire Crud - NiceSnippets.com</h2>
                    </div>
                    <div class="card-body">
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                        @livewire('assets')
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    @livewireScripts
    <script type="text/javascript">
        window.livewire.on('assetStore', () => {
            $('#exampleModal').modal('hide');
        });

        window.livewire.on('assetUpdate', () => {
            $('#updateModal').modal('hide');
        });
    </script>
    <script>
        $("document").ready(function() {
            setTimeout(function() {
                $("div.alert").remove();
            }, 1000); // 5 secs

        });
    </script>
@endsection
