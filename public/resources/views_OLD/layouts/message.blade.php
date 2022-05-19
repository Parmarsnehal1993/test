<div class="row">
    <div class="col-md-8 col-md-offset-2 show-error">
        @if ($errors->any())
            <script type="text/javascript">
                var message = "{{ implode('', $errors->all(':message')) }}";
                var messageIcon = 'error';
                swal(message, {
                  icon: messageIcon,
                });
            </script>
            {{-- <div class="alert alert-danger">{{ implode('', $errors->all(':message')) }}</div> --}}
        @endif

        @if(session()->has('message'))
            <script type="text/javascript">
                var message = "{{ session()->get('message') }}";
                var messageIcon = 'success';
                swal(message, {
                  icon: messageIcon,
                });
            </script>
            {{-- <div class="alert alert-success">
                {{ session()->get('message') }}
            </div> --}}
        @endif
    </div>
</div>