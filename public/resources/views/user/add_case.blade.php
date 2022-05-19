@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Add Case manually</h2><hr>
        <form method="post" action="{{ route('save_case') }}">
                @csrf
                <div class="row">
                    
                    <div class="col-md-6">
                            <div class="form-group">
                                <label for="mobile">Mobile: <span style="color:red">*</span></label>
                                <input id="mobile" class="form-control" type="text" name="mobile" placeholder="Mobile" value="">
                                <span class="text-danger">{{ $errors->first('mobile') }}</span>
                            </div>
                                <div class="form-group">
                                    <label for="firstname">First Name: <span style="color:red">*</span></label>
                                    <input id="firstname" class="form-control" type="text" name="firstname"placeholder="First Name">
                                    <span class="text-danger">{{ $errors->first('firstname') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Last Name: <span style="color:red">*</span></label>
                                    <input id="lastname" class="form-control" type="text" name="lastname" placeholder="Last Name" value="">
                                    <span class="text-danger">{{ $errors->first('lastname') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="birthDay">D.O.B.: <span style="color:red">*</span></label>
                                    <input type="text" id="birthDay" class="form-control datepicker" name="birthDay"
                                    placeholder="D.O.B." value="">
                                    <span class="text-danger">{{ $errors->first('birthDay') }}</span>
                                </div>
                            </div>
            
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email: <span style="color:red">*</span></label>
                                <input id="email" class="form-control" type="email" name="email" placeholder="Email" value="">
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="email">Employment: <span style="color:red">*</span></label>
                                <select name="employment" id="employment" class="form-control">
                                    <option value="">select option</option>
                                    @foreach($getEmpStatus as $getEmpStatuskey => $getEmpStatusvalue)
                                        <option value="{{ $getEmpStatusvalue->name }}">{{ $getEmpStatusvalue->display_name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('employment') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="email">Living arranegment: <span style="color:red">*</span></label>
                                <select id="living_arrangment" name="living_arrangment" class="form-control">
                                      <option value="">Select option</option>
                                      @foreach($living_arrangment as $key => $value)
                                        <option value="{{ $value }}">{{ $value }}</option>
                                      @endforeach
                                </select>    
                                <span class="text-danger">{{ $errors->first('living_arrangment') }}</span>
                            </div>
                            
                            <div class="form-group">
                                <label for="country">Country: <span style="color:red">*</span></label>
                                <select class="form-control" id="country" name="country">
                                    <option value="">Select option</option>
                                    @foreach ($country as $key => $value)
                                        <option value="{{ $value->name }}">{{ $value->display_name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('country') }}</span>
                            </div>
                        </div>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Add Case" class="text-center btn btn-outline-info float-right btn-large">
                </div>
            </form>
        </div>
    </div>
                            

<script type="text/javascript">
    $(document).ready(function(){
        $( ".datepicker" ).datepicker(
        {
        changeMonth: true,
        changeYear: true,
        dateFormat: 'mm/dd/yy',
        yearRange: '1950:2040', 
        beforeShow: function (input, inst) {
            var rect = input.getBoundingClientRect();
            setTimeout(function () {
                inst.dpDiv.css({ top: rect.top + 40, left: rect.left + 0 });
            }, 0);
        }});
    });
    </script>

    

@endsection