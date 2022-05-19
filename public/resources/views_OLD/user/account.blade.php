@extends('layouts.app')

@section('content')
<!-- main content start -->
<section class="main-content">
    <div class="container">
        <!-- included user common detail -->
        @include('user.user_common_details')
        <!-- card details start -->
        <section class="card-details font-bold text-uppercase">
            <form action="{{ route('user.save_account') }}" method="POST">
                @csrf
                <input type="hidden" id="userId" name="userId" value="{{ $userInfo->user_id }}">
                <div class="table-responsive grid-wrapper">
                    <table class="bold-table text-normal small-text has-space form-table">
                        <tbody>
                            <tr>
                                <td>Solution type:</td>
                                <td>
                                    @if (isset($userSolution->solutionType) && !empty($userSolution->solutionType))
                                        {{ $userSolution->solutionType }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Insolvency Practitioner:</td>
                                <td>
                                    @if (isset($userSolution->insolvency) && !empty($userSolution->insolvency))
                                        {{ $userSolution->insolvency }}
                                    @endif
                            </td>
                            </tr>
                            <tr>
                                <td>Fee:</td>
                                <td><input class="form-control" type="text" id="fee" name="fee" placeholder="Fee" value="@if(isset($userAccount->fee) && !empty($userAccount->fee)){{ trim($userAccount->fee) }}@endif"></td>
                            </tr>
                            <tr>
                                <td>Due Date:</td>
                                <td><input class="form-control datepicker" type="text" id="dueDate" name="dueDate" placeholder="Due Date" value="@if(isset($userAccount->dueDate) && !empty($userAccount->dueDate)) {{ date('d-m-Y', strtotime($userAccount->dueDate)) }} @endif"></td>
                            </tr>
                            <tr>
                                <td>Claw Back:</td>
                                <td><input class="form-control text-danger" id="clawBack" name="clawBack" type="text" placeholder="Claw Back" value="@if(isset($userAccount->clawBack) && !empty($userAccount->clawBack)){{ trim($userAccount->clawBack) }}@endif"></td>
                            </tr>
                            <tr>
                                <td>Cancelled Date:</td>
                                <td><input class="form-control datepicker" type="text" id="cancelledDate" name="cancelledDate" placeholder="Cancelled Date" value="@if(isset($userAccount->cancelledDate) && !empty($userAccount->cancelledDate)) {{ date('d-m-Y', strtotime($userAccount->cancelledDate)) }} @endif"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="text-right">
                    <input type="submit" class="btn btn-large btn-default-outlined" name="user_account" title="Save" value="Save">
                    @if(isset($userAccount) && !empty($userAccount->userId))
                        <a href="{{ route('user.delete_user_account', $userAccount->userId)}}" onclick="return confirm('Are you sure to delete this record?')" class="btn btn-default-outlined case-btn text-uppercase">DELETE</a>
                    @endif
                </div>
            </form>
        </section>
        <!-- card details end -->
    </div>
</section>
<script type="text/javascript">
$(document).ready(function(){
    $( ".datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' });
});
</script>
@endsection