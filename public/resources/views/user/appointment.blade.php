@extends('layouts.app')

@section('content')
<!-- main content start -->
<section class="main-content">
    <div class="container">
        <!-- included user common detail -->
        @include('user.user_common_details')
        <!-- card details start -->
        <section class="card-details" style="padding: 55px 60px">
            <form action="{{ route('user.save_appointment') }}" method="POST">
                @csrf
                <!-- hidden fields start -->
                <input type="hidden" id="userId" name="userId" value="{{ $userInfo->user_id }}">
                <input type="hidden" id="appointmentDate" name="appointmentDate">
                <!-- hidden fields end -->
                
                <div class="col-lg-8">
                    <div class="datepicker datetimepicker12"></div>

                </div>
                <div class="col-lg-4">
                    <h2>Appointment</h2>
                    <div class="row">
                        <input name="hour" type="text" class="form-control square-textbox fixed-size" style="float:left;" placeholder="HH"  required />
                        <p class="fixed-size" style="float:left;">:</p>
                        <input name="minute" type="text" class="form-control square-textbox fixed-size" style="float:left;" placeholder="MM" required/>
                    </div>
                    
                    <p class="info">message:</p>
                    
                    <textarea rows="6" name="message" class="form-control square-textbox"></textarea>
                </div>
                <div class="text-right">
                    <input type="submit" class="btn btn-primary"  style="margin: 0" title="Save Appointment" value="Save Appointment">
                </div>
            </form>
        </section>
        <!-- card details end -->
    </div>
</section>
<!-- main content end -->
<script type="text/javascript">

$(function () {
    $(".datepicker").datepicker({
        inline:true,
        changeMonth: true,
        changeYear: true,
        onSelect: function(dateText, inst) {
            var date = $(this).val();
            $("#appointmentDate").val(date.toString());
        }
    });
});
</script>
@endsection