@extends('layouts.app')

@section('content')
<!-- main content start -->
<section class="main-content">
    <div class="container">
        <!-- included user common detail -->
        @include('user.user_common_details')
        <!-- card details start -->
        <section class="card-details" style="padding: 55px 60px">
            <h3 style="    padding-bottom: 20px;
            font-weight: 700;">NOTES</h3>
            <form action="{{ route('user.save_user_notes') }}" method="POST">
                @csrf
                <input type="hidden" id="userId" name="userId" value="{{ $userInfo->user_id }}">
                <div class="col-lg-12">
                    <textarea id = "client_notes" name = "client_notes" class="form-control square-textbox" maxlength="1000" rows="6"></textarea>
                </div>
                <div class="pull-right">
                    <input type="submit" class="btn btn-primary"  style="margin: 0" title="Save Notes" value="Save Notes">
                </div>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span>
                        @if(!empty($listAllNotes))
                            @foreach($listAllNotes as $listAllNotesKey => $listAllNotesValue)
                                <h4>{{ date('d-m-Y', strtotime($listAllNotesValue->noteDateTime)) }} @if(isset($listAllNotesValue->user->name ) && !empty($listAllNotesValue->user->name )) {{ $listAllNotesValue->user->name }} @endif </h4>
                                <p>{{ $listAllNotesValue->notes }}</p>
                            @endforeach
                        @endif
                    </span>
            </form>
        </section>
        <!-- card details end -->
        <!-- card details end -->
    </div>
</section>
<!-- main content end -->
@endsection