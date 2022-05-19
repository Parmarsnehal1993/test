<div class="row">
    <div class="col-md-8 col-md-offset-2 show-error">
        @if ($errors->any())
            <div class="alert alert-danger">{{ implode('', $errors->all(':message')) }}</div>
        @endif

        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
    </div>
</div>