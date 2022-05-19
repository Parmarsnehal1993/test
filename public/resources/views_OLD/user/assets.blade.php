
<div class="row">
    <div class="col-6"></div>
    <div class="col-6">
       <div class="card-body">
             @php 
             $AssetsCounter = 0;
             @endphp  
                @if(!empty($asset_data))     
                    @foreach($asset_data as $value)  
                       @php $AssetsCounter += $value->estimatedValue ? $value->estimatedValue : 0;  @endphp  
                    @endforeach
                        <h1 class="text-center line-height-auto height-auto calculated_total_asset">&#163; {{ number_format($AssetsCounter) }}</h1>
                   
                @else
                        <h1 class="text-center line-height-auto height-auto calculated_total_asset"> &#163;0 </h1>
                    
                @endif
        </div>
    </div>
</div>

<div class="plus-sign" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#asset">
        <img src="{!! asset('images/icons/Plus_Icon@2x.png')!!}" alt="Add" width="30">
  </div>
  <div id="asset" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content card card-secondary">
            <div class="modal-header">
            <div class="col-md-10">
            <h1 class="modal-title d-inline-block">Assets</h1>
            <span class="alert alert-danger bg-transperent float-right"> <i class="fa fa-info-circle"></i>&nbsp;Assets must have a minimum value of <strong>£1000</strong></span>
            </div>
            <button type="button" class="close alert_open">
                <img src="{!! asset('images/icons/Cross_Icon@2x.png')!!}" alt="Close" class="img-fulid" width="40" height="40">
            </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                
                                <div class="row mt-0">
                                    <div class="assets-data">
                                        <ul class="table-header align-items-center">
                                            <li>#</li>
                                            <li>Assets Value</li>
                                            <li>Type Of Asset</li>
                                            <li>&nbsp;</li>
                                        </ul>   
                                       
                                        @php 
                                            $userAssetsCounter = 1; 
                                        @endphp  
                                        
                                        @if(!empty($asset_data))     
                                              @foreach($asset_data as $data)  
                                                    <ul class="table-body align-items-center flex-wrap">
                                                        <li class="user_asset_counter"> {{ $userAssetsCounter  }} </li>
                                                        <li class="asset_estimated_value" id="single_asset_estimated_value_{{ $userAssetsCounter }}"> {{ $data->estimatedValue  }} </li>
                                                        <li id="single_asset_type_{{ $userAssetsCounter }}"> {{ $data->type }}</li>
                                                        {{-- <li></li> --}}
                                                        <li>
                                                        <a href="#" data-toggle="collapse" data-target="#asset_form_{{ $userAssetsCounter }}" class="collapsed" aria-expanded="false">
                                                            <img src="{!! asset('images/icons/Plus_Icon@2x.png')!!}" alt="Plus" class="img-fluid" width="30">
                                                        </a>
                                                        </li>
                                                        <div id="asset_form_{{ $userAssetsCounter }}" class="collapse scroll-y" style="padding: 0px 15px;width: 100%;margin-right: 30px;">
                                                                {{-- <form action ="#" class="update_asset_form" method="POST"> --}}
                                                                    @csrf
                                                                    <input type="hidden" name="userId" id="userId" value="{{ $userInfo->user_id }}">
                                                                    <div class="row">
                
                                                                    <div class="col-6">
                                                                        <div class="form-group">
                                                                            <label for="assets_value_{{ $userAssetsCounter }}">assets value:</label>
                                                                            <input
                                                                                type="number"
                                                                                id="assets_value_{{ $userAssetsCounter }}"
                                                                                name="assets_value_{{ $userAssetsCounter }}" class="
                                                                                form-control update_asset_value" value="{{ $data->estimatedValue}}" placeholder="Enter Assets Value
                                                                                ">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="form-group">
                                                                            <label for="assets_type">type of assets:</label>
                                                                            <select
                                                                                id="assets_type_{{ $userAssetsCounter }}"
                                                                                name="assets_type_{{ $userAssetsCounter }}"
                                                                                class="update_assets_type form-control"
                                                                                value = "{{ $data->type }}"
                                                                                style="width: 100%">
                                                                                @if(isset($data->type))
                                                                                <option value="">{{ $data->type }}</option>
                                                                                @else
                                                                                <option value="" selected="selected">Select Type</option>
                                                                                @endif
                                                                                <option value="VEHICLE">VEHICLE</option>
                                                                                <option value="JEWELRY">JEWELRY</option>
                                                                                <option value="PROPERTY">PROPERTY</option>
                                                                                <option value="SHARES">SHARES</option>
                                                                                <option value="ELECTRICAL GOODS">ELECTRICAL GOODS</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-9"></div>
                                                                            <div class="col-md-3 mt-3">
                                                                                <input type="submit" name="submit" id="update_asset" class="btn btn-outline-info btn-large update_single_asset" data-asset_id="{{ $data->id }}" data-asset_counter="{{ $userAssetsCounter }}">
                                                                            </div>
                                                                        </div>
                                                                 {{-- </form> --}}
                                                            </div>
                                                    </ul>
                                                    @php $userAssetsCounter++; @endphp
                                             @endforeach 
                                        @else
                                            <hr>
                                            <h2 class="text-center">No Asset found</h2>
                                        @endif
                                        <div id="get_new_asset_data"></div>
                                        <ul class="table-body align-items-center flex-wrap">
                                            <li>-</li>
                                            <li>-</li>
                                            <li>-</li>
                                            <li>
                                                <a href="#" data-toggle="collapse" data-target="#add_assets" class="collapsed" aria-expanded="false">
                                                    <img src="http://thinkdream.in/freeze_cms_new/public/images/icons/Plus_Icon@2x.png" alt="Plus" class="img-fluid" width="30">
                                                </a>
                                            </li>
                                            <div id="add_assets" class="scroll-y collapse" style="padding: 0px 15px; width: 100%; margin-right: 30px;">
                                                <form action = "#" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="userId" id="userId" value="{{ $userInfo->user_id }}">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label class="badge badge-danger col-12" id="show_asset_error" style="display: none;font-size: smaller;padding: 10px;"></label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="assets_value">assets value:</label>
                                                                <input type="number" id="assets_value" name="assets_value" class=" form-control" placeholder="Enter Assets Value">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="assets_type">type of assets:</label>
                                                                <select id="assets_type" name="assets_type" class="form-control" style="width: 100%" required="">
                                                                    <option value="" selected="selected">Select Type</option>
                                                                    <option value="VEHICLE">VEHICLE</option>
                                                                    <option value="JEWELRY">JEWELRY</option>
                                                                    <option value="PROPERTY">PROPERTY</option>
                                                                    <option value="SHARES">SHARES</option>
                                                                    <option value="ELECTRICAL GOODS">ELECTRICAL GOODS</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-9"></div>
                                                        <div class="col-md-3 mt-3">
                                                            <input type="submit" name="submit" id="submit" class="asset_form btn btn-outline-info btn-large">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
            <div class="modal-footer mt-5 mb-4">
                <a href="javascipt:void(0)" class="btn btn-outline-info float-right btn-large" data-dismiss="modal">Update</a>
            </div>
        </div>
    </div>
</div>






<script>
    
    $(document).on('focus', '#assets_value', function(){
        $('#show_asset_error').html('');
        $('#show_asset_error').hide();
    });

    $(document).on('click','.asset_form',function(e)
    {
        e.preventDefault();
        var sr = $('#SR').val();
        var assets_value = $('#assets_value').val();
        var userId = $('#userId').val();
        var type =  $('#assets_type option:selected').text();

        if(parseInt(assets_value) < 1000) {
            $('#show_asset_error').html('Assets must have a minimum value of £1000');
            $('#show_asset_error').show();
            return false;
        }
        $.ajax({
            url: '{{ route('add_asset_data') }}',
            method:'POST',
            data:{
                "_token": "{{ csrf_token() }}",
                userId:userId,
                sr:sr,
                assets_value : assets_value,
                type : type
            },
            success: function(data)
            {
                var messageIcon = 'success';
                var message = 'Data Saved Successfully';
                swal(message, {
                    icon: messageIcon,
                });
                var asset_counter_js = $( ".user_asset_counter" ).last().text();
                if(asset_counter_js != "") {
                    asset_counter_js = parseInt(asset_counter_js) + 1;
                } else {
                    asset_counter_js = 1;
                }
                var id = data;
                $('#assets_value').val('');
                $("#assets_type").prop("selectedIndex", 0);
                $.ajax({
                        url: '{{ route('get_asset_data') }}',
                        method: 'get',
                        data: {
                            id:id,
                            counter:asset_counter_js
                        },
                        dataType:'json',
                        success:function(data)
                        {
                            var total_asset_value = 0;
                            $('.asset_estimated_value').each(function(){
                                var current_value = 0;
                                current_value = $(this).text();
                                total_asset_value = parseInt(total_asset_value) + parseInt(current_value);
                            })

                            // the currently added value not fetch from above loop so add it directly
                            total_asset_value = parseInt(total_asset_value) + parseInt(assets_value);
                            
                            $('.calculated_total_asset').html('&#163;' + total_asset_value);
                            $('#get_new_asset_data').append(data);
                        }
                });
            
           }
       });
       
       
    });
    
</script>

<script>
    
//$(document).on('submit','.update_asset_form',function(e)
$(document).on('click','.update_single_asset',function(e)
{
    e.preventDefault();

    var counter_value = $(this).data('asset_counter');
    var asset_id = $(this).data('asset_id');
    var userId = $('#userId').val();
    
    var assets_value = $('#assets_value_'+counter_value).val();
    
    var type = $('#assets_type_' +counter_value+' option:selected').text();

    //console.log('assets_value => ', assets_value, 'type => '+type);
        $.ajax({
            url : '{{ route('user.update_asset') }}',
            method : 'POST',
            data:{
             "_token": "{{ csrf_token() }}",
              userId : userId,
              asset_id : asset_id,
              assets_value : assets_value,
              type : type
            },
            dataType : 'json',
            success : function(data)
            {
                 var messageIcon = 'error';
                  if (data == 'success') {
                    $('#single_asset_estimated_value_'+counter_value).html(assets_value);
                    $('#single_asset_type_'+counter_value).html(type);

                    var total_asset_value = 0;
                    $('.asset_estimated_value').each(function(){
                        var current_value = 0;
                        current_value = $(this).text();
                        total_asset_value = parseInt(total_asset_value) + parseInt(current_value);
                    })

                    // the currently added value not fetch from above loop so add it directly
                    total_asset_value = parseInt(total_asset_value);
                    
                    $('.calculated_total_asset').html('&#163;' + total_asset_value);
                    var message = 'User Asset updated successfully';
                    var messageIcon = 'success';
                 } else {
                    var message = 'something wrong please try again';
                 }
                swal(message, {
                  icon: messageIcon,
                });
            }
        });
});
</script>




