@extends('layouts.app')

@section('content')
<!-- main content start -->
<section class="main-content">
    <div class="container">
        <!-- commmon error message display section start -->
        @include('layouts.message')
        <!-- commmon error message display section end -->
        <section class="card-details">
            <h4>CHANGE PASSWORD</h4>
            <form action="{{ route('saveChangePassword') }}" method="POST">
                @csrf
                <div class="table-responsive grid-wrapper">
                    <table class="bold-table text-normal small-text has-space form-table">
                        <tbody>
                            <tr>
                                <td>OLD PASSWORD:</td>
                                <td><input class="form-control" type="password" name="old_password" id="old_password" required></td>
                            </tr>
                            <tr>
                                <td>NEW PASSWORD:</td>
                                <td><input class="form-control" type="password" name="new_password" id="new_password" required></td>
                            </tr>
                            <tr>
                                <td>CONFIRM NEW PASSWORD:</td>
                                <td><input class="form-control" type="password" name="confirm_password" id="confirm_password" oninput="check(this)" required></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="text-right">
                    <input type="submit" class="btn btn-primary" name="change_password" value="Save">
                </div>
            </form>
        </section>
    </div>
</section>
<script language='javascript' type='text/javascript'>
    function check(input) {
        if (input.value != document.getElementById('new_password').value) {
            input.setCustomValidity('Confirm Password Must be Matching with New Password.');
        } else {
            // input is valid -- reset the error message
            input.setCustomValidity('');
        }
    }
</script>
@endsection