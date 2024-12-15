@csrf

<div class="form-group " style="display: none;" id="div_service_name">
    <label for="service_name" class="col-sm-2 asterisk   control-label">service name</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            <input type="text" id="service_name" name="service_name" value="{{ isset($seriveRequestFields->service_name) ?$seriveRequestFields->service_name : '' }}" class="form-control service_name"
                   placeholder="Input service name">
        </div>
    </div>
</div>

<div class="form-group  " style="display: none;"  id="div_service_type">
    <label for="service_type" class="col-sm-2 asterisk   control-label">service Type</label>
    <div class="col-sm-8">
        <!-- <input type="hidden" name="service_type"> -->
        <select class="form-control service_type select2-hidden-accessible" id="selservice_type" multiple style="width: 100%;" name="service_type[]"
                data-value="" tabindex="-1" aria-hidden="true">
            <option value=""></option>
        </select>
    </div>
</div>

<div class="form-group " style="display: none;"  id="div_tire_type">
    <label for="tire_type" class="col-sm-2 asterisk   control-label">tire Type</label>
    <div class="col-sm-8">
        <input type="hidden" name="tire_type">
        <select class="form-control tire_type select2-hidden-accessible"  id="seltire_type" style="width: 100%;" name="tire_type"
                data-value="" tabindex="-1" aria-hidden="true">
            <option value=""></option>
        </select>
    </div>
</div>

<div class="form-group  " style="display: none;" id="div_front_tire_size">
    <label for="front_tire_size" class="col-sm-2 asterisk   control-label">front tire size</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            <input type="text" id="front_tire_size" name="front_tire_size" value="{{ isset($seriveRequestFields->front_tire_size) ?$seriveRequestFields->front_tire_size : '' }}" class="form-control front_tire_size"
                   placeholder="Input front tire size">
        </div>
    </div>
</div>

<div class="form-group  " style="display: none;" id="div_back_tire_size">
    <label for="back_tire_size" class="col-sm-2 asterisk  control-label">back tire size</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            <input type="text" id="back_tire_size" name="back_tire_size" value="{{ isset($seriveRequestFields->back_tire_size) ?$seriveRequestFields->back_tire_size : '' }}" class="form-control back_tire_size"
                   placeholder="Input back tire size">
        </div>
    </div>
</div>

<div class="form-group  " style="display: none;" id="div_numb_cylind">
    <label for="numb_cylind" class="col-sm-2 asterisk  control-label">numb cylind</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            <input type="text" id="numb_cylind" name="numb_cylind" value="{{ isset($seriveRequestFields->numb_cylind) ?$seriveRequestFields->numb_cylind : '' }}" class="form-control numb_cylind"
                   placeholder="Input numb cylind">
        </div>
    </div>
</div>

<div class="form-group  " style="display: none;" id="div_chassis_numb">
    <label for="chassis numb" class="col-sm-2 asterisk  control-label">chassis numb</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            <input type="text" id="chassis_numb" name="chassis_numb" value="{{ isset($seriveRequestFields->chassis_numb) ?$seriveRequestFields->chassis_numb : '' }}" class="form-control chassis numb"
                   placeholder="Input chassis numb">
        </div>
    </div>
</div>

<div class="form-group  " style="display: none;" id="div_front_rim_size">
    <label for="front_rim_size" class="col-sm-2 asterisk  control-label">front rim size</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            <input type="text" id="front_rim_size" name="front_rim_size" value="{{ isset($seriveRequestFields->front_rim_size) ?$seriveRequestFields->front_rim_size : '' }}" class="form-control front_rim_size"
                   placeholder="Input front rim size">
        </div>
    </div>
</div>

<div class="form-group  " style="display: none;" id="div_back_rim_size">
    <label for="front_rim_size" class="col-sm-2 asterisk  control-label">Back rim size</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            <input type="text" id="back_rim_size" name="back_rim_size" value="{{ isset($seriveRequestFields->back_rim_size) ?$seriveRequestFields->back_rim_size : '' }}" class="form-control back_rim_size"
                   placeholder="Input Back rim size">
        </div>
    </div>
</div>

<div class="form-group  " style="display: none;" id="div_numb_tire">
    <label for="numb_tire" class="col-sm-2 asterisk  control-label">numb tire</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            <input type="text" id="numb_tire" name="numb_tire" value="{{ isset($seriveRequestFields->numb_tire) ?$seriveRequestFields->numb_tire : '' }}" class="form-control numb_tire"
                   placeholder="Input numb tire">
        </div>
    </div>
</div>

<div class="form-group  " style="display: none;" id="div_request_details">
    <label for="request_details" class="col-sm-2 asterisk   control-label">request details</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            <input type="text" id="request_details" name="request_details" value="{{ isset($seriveRequestFields->request_details) ?$seriveRequestFields->request_details : '' }}" class="form-control request_details"
                   placeholder="Input request details">
        </div>
    </div>
</div>

<div class="form-group  " style="display: none;" id="div_special_request">
    <label for="special_request" class="col-sm-2 asterisk   control-label">special request</label>
    <div class="col-sm-8">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
            <input type="text" id="special_request" name="special_request" value="{{ isset($seriveRequestFields->special_request) ?$seriveRequestFields->special_request : '' }}" class="form-control special_request"
                   placeholder="Input special request">
        </div>
    </div>
</div>
<div class="form-group  " style="display: none;" id="div_photo1">
    <label for="photo1" class="col-sm-2  control-label">photo1</label>
    <div class="col-sm-8">
        <div class="file-input file-input-new">
            <div class="file-preview ">
                <button type="button" class="close fileinput-remove" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <div class="file-drop-disabled">
                    <div class="file-preview-thumbnails">
                    </div>
                    <div class="clearfix"></div>
                    <div class="file-preview-status text-center text-success"></div>
                    <div class="kv-fileinput-error file-error-message" style="display: none;"></div>
                </div>
            </div>
            <div class="kv-upload-progress kv-hidden" style="display: none;">
                <div class="progress">
                    <div class="progress-bar bg-success progress-bar-success progress-bar-striped active"
                         role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%;">
                        0%
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="input-group file-caption-main">
                <div class="file-caption form-control  kv-fileinput-caption" tabindex="500">
                    <span class="file-caption-icon"></span>
                    <input class="file-caption-name" onkeydown="return false;" onpaste="return false;"
                           placeholder="Select image">
                </div>
                <div class="input-group-btn input-group-append">
                    <div tabindex="500" class="btn btn-primary btn-file">
                        <i class="glyphicon glyphicon-folder-open"></i>&nbsp;
                        <span class="hidden-xs">Browse</span>
                        <input type="file" class="photo1" name="photo1"
                            value="{{ isset($seriveRequestFields->photo1) ?$seriveRequestFields->photo1 : '' }}" id="1604916862123_6">
                        <input type='hidden' name='last_photo1' value='{{ isset($seriveRequestFields->photo1) ?$seriveRequestFields->photo1 : null }}'>
                    </div>
                </div>
            </div>
            <img src="/{{ isset($seriveRequestFields->photo1) ?$seriveRequestFields->photo1 : '' }}" style='width: 150px;height: 150px;' />

        </div>
    </div>
</div>
<div class="form-group  " style="display: none;"  id="div_photo2">
    <label for="photo2" class="col-sm-2  control-label">photo2</label>
    <div class="col-sm-8">
        <div class="file-input file-input-new">
            <div class="file-preview ">
                <button type="button" class="close fileinput-remove" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <div class="file-drop-disabled">
                    <div class="file-preview-thumbnails">
                    </div>
                    <div class="clearfix"></div>
                    <div class="file-preview-status text-center text-success"></div>
                    <div class="kv-fileinput-error file-error-message" style="display: none;"></div>
                </div>
            </div>
            <div class="kv-upload-progress kv-hidden" style="display: none;">
                <div class="progress">
                    <div class="progress-bar bg-success progress-bar-success progress-bar-striped active"
                         role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%;">
                        0%
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="input-group file-caption-main">
                <div class="file-caption form-control  kv-fileinput-caption" tabindex="500">
                    <span class="file-caption-icon"></span>
                    <input class="file-caption-name" onkeydown="return false;" onpaste="return false;"
                           placeholder="Select image">
                </div>
                <div class="input-group-btn input-group-append">
                    <div tabindex="500" class="btn btn-primary btn-file">
                        <i class="glyphicon glyphicon-folder-open"></i>&nbsp;
                        <span class="hidden-xs">Browse</span>
                        <input type="file" class="photo2" name="photo2"
                            value="{{ isset($seriveRequestFields->photo2) ?$seriveRequestFields->photo2 : '' }}" id="1604916862145_38">
                        <input type='hidden' name='last_photo2' value='{{ isset($seriveRequestFields->photo2) ?$seriveRequestFields->photo2 : null }}'>
                    </div>
                </div>
            </div>
            <img src="/{{ isset($seriveRequestFields->photo2) ?$seriveRequestFields->photo2 : '' }}" style='width: 150px;height: 150px;' />
        </div>
    </div>
</div>
<script>

    $(document).ready(function() {

        // User Section Info
        $('.user_id').on('change', function() {
            var data = $(".user_id option:selected").val();
            $('#user_name').closest('.form-group').hide();
            $('#user_email').closest('.form-group').hide();
            $('#user_phone').closest('.form-group').hide();
            if(data == '' )
            {
                $('#user_name').closest('.form-group').show();
                $('#user_email').closest('.form-group').show();
                $('#user_phone').closest('.form-group').show();
            }
        });
        var user =  $(".user_id option:selected").val();
        $('#user_name').closest('.form-group').hide();
        $('#user_email').closest('.form-group').hide();
        $('#user_phone').closest('.form-group').hide();
        if(user == '' )
        {
            $('#user_name').closest('.form-group').show();
            $('#user_email').closest('.form-group').show();
            $('#user_phone').closest('.form-group').show();
        }
        // End of User Section Info
        // Address Section Info
        $('.address_id').on('change', function() {
            var address = $(".address_id option:selected").val();

            $.ajax({
                method: "get",
                url: "/admin/addresse_details/"+address,

                success: function(result) {
                    console.log($('.addresse_area').val(result.area_id));


                    $('.addresse_area').select2();
                    $('#addresse_block').val(result.block);
                    $('#addresse_street').val(result.street);
                    $('#addresse_building').val(result.building);
                    $('#addresse_extra_info').val(result.extra_info);

                }
            });
        });
        var user =  $(".address_id option:selected").val();
        // End  Address Section Info

        // Service Section Info
        var data = $(".service_id option:selected").val();

        $('#div_service_type').hide();
        $('#div_front_tire_size').hide();
        $('#div_back_tire_size').hide();
        $('#div_tire_type').hide();
        $('#div_chassis_numb').hide();
        $('#div_numb_cylind').hide();
        $('#div_front_rim_size').hide();
        $('#div_back_rim_size').hide();
        $('#div_numb_tire').hide();
        $('#div_request_details').hide();
        $('#div_photo1').hide();
        $('#div_photo2').hide();
        $.ajax({
            method: "get",
            url: "/api/auth/service/"+data,

            success: function(result) {

                if(result.service.show_service_type == 1 )
                {

                    $("#selservice_type").html('<option ></option>');


                    var i = 0;
                    result.service.service_type.forEach((options)=>{
                    var str = $('.service_type_hidden').val();
                    var res = str.split(",");

                    if(res[i] == options.name_en){

                        var select = "selected";
                    }
                        // $('.service_type_hidden').val();
                        // alert(fruits.includes("Banana")); // Outputs: true
                        // if(){


                        // }
                        $("#selservice_type").append('<option '+select+' value="'+options.name_en+'">'+options.name_en+'</option>');
                        i++;

                    });
                    $('#selservice_type').select2(); // Notify only Select2 of changes
                    $('#div_service_type').show();
                    $('#selservice_type').prop('required',true);

                }
                if(result.service.show_tire_size == 1 )
                {
                    $('#div_front_tire_size').show();
                    $('#div_back_tire_size').show();
                    $('#front_tire_size').prop('required',true);


                }
                if(result.service.show_tire_type == 1 )
                {
                    $("#seltire_type").html('<option ></option>');

                    result.service.tire_type.forEach((options)=>{
                        $("#seltire_type").append('<option value="'+options.name_en+'">'+options.name_en+'</option>');
                    });
                    $('#seltire_type').select2(); // Notify only Select2 of changes
                    $('#div_tire_type').show();
                    $('#seltire_type').prop('required',true);

                }
                if(result.service.show_chassis_numb == 1 )
                {
                    $('#div_chassis_numb').show();
                }
                if(result.service.show_numb_cylind == 1 )
                {
                    $('#div_numb_cylind').show();
                    $('#numb_cylind').prop('required',true);
                }
                if(result.service.show_rim_size == 1 )
                {
                    $('#div_front_rim_size').show();
                    $('#div_back_rim_size').show();
                    $('#front_rim_size').prop('required',true);
                    $('#back_rim_size').prop('required',true);
                }
                if(result.service.show_numb_tire == 1 )
                {
                    $('#div_numb_tire').show();
                    $('#numb_tire').prop('required',true);
                }
                if(result.service.show_request_details == 1 )
                {
                    $('#div_request_details').show();
                }
                if(result.service.show_special_request == 1 )
                {
                    $('#div_special_request').show();
                }                
                if(result.service.show_upload_photo == 1 )
                {
                    $('#div_photo1').show();
                    $('#div_photo2').show();
                }
            }
        });
        setTimeout(function(){
            //var val = $(".service_type").val($('.service_type_hidden').val());
            // alert($('.tire_type_hidden').val());
            $(".tire_type").val($('.tire_type_hidden').val());
            // alert(3);
            //$('.service_type').select2();
            $('.tire_type').select2();
            // $("#seltire_type").select2().select2('val',$('#tire_type_hidden').val()).trigger('change');
        }, 1000);
    });

    $('.service_id').on('change', function() {

        var data = $(".service_id option:selected").val();
        $('#div_service_type').hide();
        $('#div_front_tire_size').hide();
        $('#div_back_tire_size').hide();
        $('#div_tire_type').hide();
        $('#div_chassis_numb').hide();
        $('#div_numb_cylind').hide();
        $('#div_front_rim_size').hide();
        $('#div_back_rim_size').hide();
        $('#div_numb_tire').hide();
        $('#div_request_details').hide();
        $('#div_special_request').hide();
        $('#div_photo1').hide();
        $('#div_photo2').hide();

        $.ajax({
            method: "get",
            url: "/api/auth/service/"+data,

            success: function(result) {

                if(result.service.show_service_type == 1 )
                {
                    $("#selservice_type").html('<option ></option>');

                    result.service.service_type.forEach((options)=>{
                        $("#selservice_type").append('<option value="'+options.name_en+'">'+options.name_en+'</option>');
                    });
                    $('#selservice_type').select2(); // Notify only Select2 of changes
                    $('#div_service_type').show();
                    $('#selservice_type').prop('required',true);
                }
                if(result.service.show_tire_size == 1 )
                {
                    $('#div_front_tire_size').show();
                    $('#div_back_tire_size').show();
                    $('#front_tire_size').prop('required',true);


                }
                if(result.service.show_tire_type == 1 )
                {
                    $("#seltire_type").html('<option ></option>');

                    result.service.tire_type.forEach((options)=>{
                        $("#seltire_type").append('<option value="'+options.name_en+'">'+options.name_en+'</option>');
                    });
                    $('#seltire_type').select2(); // Notify only Select2 of changes
                    $('#div_tire_type').show();
                    $('#seltire_type').prop('required',true);

                }
                if(result.service.show_chassis_numb == 1 )
                {
                    $('#div_chassis_numb').show();
                }
                if(result.service.show_numb_cylind == 1 )
                {
                    $('#div_numb_cylind').show();
                    $('#numb_cylind').prop('required',true);
                }
                if(result.service.show_rim_size == 1 )
                {
                    $('#div_front_rim_size').show();
                    $('#div_back_rim_size').show();
                    $('#front_rim_size').prop('required',true);
                    $('#back_rim_size').prop('required',true);
                }
                if(result.service.show_numb_tire == 1 )
                {
                    $('#div_numb_tire').show();
                    $('#numb_tire').prop('required',true);
                }
                if(result.service.show_special_request == 1 )
                {
                    $('#div_special_request').show();
                }
                if(result.service.show_upload_photo == 1 )
                {
                    $('#div_photo1').show();
                    $('#div_photo2').show();
                }
            }
        });
    });
    // End of Service Section Info


</script>
