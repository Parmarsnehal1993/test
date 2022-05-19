<style>
    .theme-overflow {
        height: 370px !important;min-height:auto;
    }
</style>
        <div class="card">
            <div class="card-title">
                New Case Note
            
                    @php
                    $listAllNotes = getAllUserNotes($userInfo->user_id);
                    @endphp
                
            </div>
            <div class="card-body">
                <form action="{{ route('user.save_user_notes') }}" method="POST">
                    @csrf

                    {{-- @if($loginUser->user_type == 3) --}}
                    <input type="hidden" id="userId" name="userId" value="{{ $userInfo->user_id }}">
                    {{-- @else
                    <input type="hidden" id="userId" name="userId" value="{{ $userInfo->user_id }}">
                    @endif --}}
                    <textarea name="client_notes" id="client_notes" cols="10" rows="5" class="form-control text-area mb-2"></textarea>
                    <div class="clearfix">
                        <input type="submit" id="save_notes" class="btn btn-outline-info float-right" value="Save Notes">
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="d-block theme-overflow height-auto" style="height: 370px !important;">
                <div class="card-title">saved Case notes</div>
                <div class="card-body">
                    <div class="scroll-y">
                        @if(!empty($listAllNotes))
                            @foreach($listAllNotes as $listAllNotesKey => $listAllNotesValue)
                                <div class="single-note">
                                    <p>
                                        {{ date('d-m-Y', strtotime($listAllNotesValue->noteDateTime)) }}
                
                                        @if(isset($listAllNotesValue->user->name ) && !empty($listAllNotesValue->user->name ))
                                            - <span class="text-info">
                                                {{ $listAllNotesValue->user->name }}
                                        @endif
                                            </span>
                                    </p>
                                    <span>{{ $listAllNotesValue->notes }}</span>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </ class="d-block theme-overflow height-auto" style="height:460px !important">
        </div>
    

<script type="text/javascript">
    $(document).on('click','#save_notes',function(){

       var client_notes = $('#client_notes').val();

       if(client_notes == '') {
       
        var messageIcon = 'error';

        var message = 'please enter a notes';

        swal(message, {
              icon: messageIcon,
            });

       }

    });
</script>



















