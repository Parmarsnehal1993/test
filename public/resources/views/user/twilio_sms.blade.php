@extends('layouts.app')

@section('content')
<!-- main content start -->
<section class="main-content">
    <div class="container">
        <!-- included user common detail -->
        {{-- @include('user.user_common_details') --}}
        <!-- card details start -->
        <section class="card-details" style="padding: 55px 60px">
            <h3 style="    padding-bottom: 20px;
            font-weight: 700;">Send SMS</h3>
            <form action="{{ route('twili_send_sms') }}" method="POST">
                @csrf
                <div class="form-group">
                    <select name="to_user" class="form-control style">
                        <option>Please Select User</option>
                        <option value="447875359918">Admin (7875359918)</option>
                        {{-- @foreach($listAllUser as $listAllUserKey => $listAllUserValue)
                            @php
                                $mobile_number = preg_filter('/^/', '44', $listAllUserValue->tel);
                            @endphp
                            <option value="{{ $listAllUserValue->user_id }}">{{ $listAllUserValue->name.'('.$mobile_number.') ' }}</option>
                        @endforeach --}}
                    </select>
                </div>
                <div class="col-lg-12">
                    <textarea id = "message" name = "message" class="form-control square-textbox" maxlength="1000" rows="6"></textarea>
                </div>
                <div class="pull-right">
                    <input type="submit" class="btn btn-primary"  style="margin: 0" title="Send SMS" value="Send">
                </div>
            </form>
        </section>
        <!-- card details end -->
        <!-- card details end -->
    </div>
</section>
<!-- main content end -->
@endsection