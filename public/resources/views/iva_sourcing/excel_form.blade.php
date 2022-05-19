@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Import Excel</h2><hr>
        <form method="post" action="{{ route('uplaod_iva_sourcing_excel') }}" enctype="multipart/form-data">
                @csrf
            <div class="col-md-10">
                <div class="form-group">
                    <input type="file" name="import_excel" id="import_excel" class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-primary btn-lg">
                </div>
            </div>
            </form>
        </div>
    </div>
                            



@endsection