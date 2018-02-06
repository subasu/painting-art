@extends('layouts.adminLayout')
@section('content')
    <style>
        .star {
            color: #ff0000;
            float: right;
            padding-right: 4px;
            padding-left: 4px;
        }

        input, label {
            font-size: 15px;
        }
        .myAlertColor{
            background-color: #28a745!important
        }
    </style>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-10 col-sm-6 col-xs-12 col-md-offset-1">
            <div class="x_panel">
                <div class="x_title">
                    <h2> فرم ایجاد اندازه ها</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>

                </div>

                {{-- table --}}
                <div class="col-md-3 col-sm-3 col-xs-12"></div>
                <div class="col-md-12 col-sm-6 col-xs-12 ">
                    <div class="x_content">
                        <form  class="form-horizontal form-label-left" id="unitForm"  method="POST" style="direction: rtl !important;">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <a  class="btn btn-info" onclick="window.location.reload(true)">شروع دوباره</a>
                                <div class="col-md-1 col-sm-1 col-xs-1">
                                    <a id="addInput" class="glyphicon glyphicon-plus btn btn-success" data-toggle="" title=" افزودن فیلد" ></a>
                                </div>
                                <div class="col-md-1 col-sm-1 col-xs-1">
                                    <a id="removeInput" class="glyphicon glyphicon-remove btn btn-danger" data-toggle="" title="حذف فیلد" ></a>
                                </div>
                                {{--<label class="control-label col-md-11 col-sm-11 col-xs-11 font-size-s" for="name">  <span--}}
                                {{--class="required star" title="پر کردن این فیلد الزامی است">نکته:</span>شما حداکثر میتوانید تا سه سطح دسته بندی نمائید و سطح چهارم محصول شما خواهد بود.--}}
                                {{--</label>--}}
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div id="showSizes" style="display: none; !important;">
                                    <div class="col-md-9 col-sm-6 col-xs-9">
                                        <select id="models"  class="form-control" name="models">

                                        </select>




                                    </div>
                                    <label class="control-label col-md-3 col-sm-4 col-xs-3" for="title">حالت های موجود : <span
                                                class="star" title="پر کردن این فیلد الزامی است"></span>
                                    </label>


                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <br/>
                            <br/>

                            <div class="item form-group" id="change1" style="display:none;!important;">
                                <div class='col-md-2'>
                                    <select id="sideways" class='form-control col-md-12 col-sm-9 col-xs-12'>
                                    </select>
                                </div>
                                <div class='col-md-2'>
                                    <select id="diameter" class='form-control col-md-12 col-sm-9 col-xs-12'>

                                    </select>
                                </div>
                                <div class='col-md-2'>
                                    <select id="width"  class='form-control col-md-12 col-sm-9 col-xs-12'>

                                    </select>
                                </div>
                                <div class='col-md-3'>
                                    <select id="length" class='form-control col-md-12 col-sm-9 col-xs-12'>

                                    </select>
                                </div>
                                <label class='control-label col-md-3 col-sm-4 col-xs-3' for='name'>اندازه های از پیش درج شده:
                                    <span class='star' title='پر کردن این فیلد الزامی است'>*</span>
                                    </label>

                            </div>
                            <div class="item form-group" id="change" style="display:none;!important;">

                            </div>
                            <div class="form-group">
                                <div class="col-md-12" style="margin-top: 2%;">
                                    <button id="reg" type="button" class="col-md-9 btn btn-primary" style="display: none; !important;">ثبت نهایی</button>
                                    <button id="newSize" type="button" class="col-md-9 btn btn-success" style="display: none;">افزودن اندازه های جدید</button>
                                    <input type="hidden" value="" id="modelId" name="modelId">
                                    <input type="hidden" value="" id="title" name="title">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12"></div>
            </div>
        </div>



        <!-- below script is to get main units -->
        <script>
            $(function () {
                //load MainUnitsCount
                var option = '';
                $.ajax
                ({
                    cache: false,
                    url: "{{Url('api/v1/getModels')}}",
                    dataType: "json",
                    type: "get",
                    success: function (response) {
                        console.log(response);
                        if (response != 0) {
                            $('#showSizes').css('display','block');
                            var item = $('#models');
                            $.each(response, function (key, value) {
                                item.empty();
                                item.append
                                (
                                    "<option selected='true' disabled='disabled'>برای افزودن اندازه ها از بین حالت های موجود حالتی را انتخاب کنید</option>"
                                )
                                item.append
                                (
                                    option += "<option name='models' content='"+value.id+"'>"+value.title+ "</option>"
                                );
                            });
                            //$('#addMainUnit').css('display','block');
                            $('#addInput').css('display','block');
                           // $('#reg').css('display','block');
                            $('#removeInput').css('display','block');
                            $('#change').css('display','block');
                          //  appendToChange();

                        }
                        else {
                            //$('#change').css('display','block');

                            //appendToChange();
                        }
                    }
                });
            })

        </script>

        <!-- below script is to append html element to change tag -->
        <script>
            function appendToChange()
            {
                if($('#title').val() != '')
                {
                    $('#change').append
                    (
                        "<div id='child' dir='ltr'>"+
                        "<br/><br/>"+
                        "<div class='col-md-2 col-sm-9 col-xs-12'>"+
                        "<input id='unit' class='form-control col-md-6 col-xs-6 required side' name='sideways[] ' value='0' placeholder='اندازه یک ضلع' required='required' type='text'>"+
                        "</div>"+
                        "<div class='col-md-2 col-sm-9 col-xs-12'>"+
                        "<input id='unit' class='form-control col-md-6 col-xs-6 required circle' placeholder='قطر' value='0'  name='diameter[]' required='required' type='text'>"+
                        "</div>"+
                        "<div class='col-md-2 col-sm-9 col-xs-12'>"+
                        "<input id='unit' class='form-control col-md-6 col-xs-6 required rectangle' name='width[]' value='0'  placeholder='عرض' required='required' type='text'>"+
                        "</div>"+
                        "<div class='col-md-3 col-sm-9 col-xs-12'>"+
                        "<input id='unit' class='form-control col-md-6 col-xs-6 required rectangle' name='length[]' value='0'  placeholder='طول' required='required' type='text'>"+
                        "</div>"+
                        "<label class='control-label col-md-3 col-sm-4 col-xs-3' for='name'>لیست اندازه های جدید   :"+
                        "<span class='star' title='پر کردن این فیلد الزامی است'>*</span>"+
                        "</label>"
                    );
                }else
                    {
                        swal
                        ({
                            title: '',
                            text: 'ابتدا حالتی را انتخاب نمائید سپس دکمه افزودن فیلد را بزنید',
                            type: 'warning',
                            confirmButtonText: "بستن"
                        });
                        return false;
                    }

            }

        </script>

        <!-- below script is to append input type -->
        <script>
            $(document).on('click','#addInput',function () {
                appendToChange();
            })
        </script>

        <!-- below script is to remove input type -->
        <script>
            $(function () {
                $(document).on('click','#removeInput',function () {
                    removeFromChange();
                });
                function removeFromChange() {
                    if ($('#change > #child').length > 1) {
                        $('#change > #child').last().remove();
                    };
                }
            });

        </script>




        <!-- below script is to send data to server side -->
        <script>
            $(document).on('click','#reg',function(){
                var option = '';
                var title  = '';
                $("[name = 'models']option:selected").each(function(){
                    $('#modelId').val($(this).attr('content'));
                    title += $(this).val();

                })
                var id = $('#modelId').val();
               // alert(id);
                var formData = new FormData ($('#unitForm')[0]);
                $.ajax
                ({
                    cache       : false,
                    url         : "{{url('admin/addNewSize')}}",
                    type        : "post",
                    processData : false,
                    contentType : false,
                    dataType    : "json",
                    data        : formData,
                    beforeSend:function () {
                        var counter = 0;
                        $(".required").each(function() {
                            if ($(this).val() == "") {
                                $(this).css("border-color" , "red");
                                counter++;
                            }
                        });
                        if(counter > 0){
                            swal
                            ({
                                title: '',
                                text: 'تعدادی از فیلدهای فرم خالی است.لطفا فیلدها را پر نمایید سپس ثبت نهایی را بزنید',
                                type:'warning',
                                confirmButtonText: "بستن"
                            });
                            return false;
                        }
                        if(title == 'مستطیل') {
                            $(".rectangle").each(function () {
                                if ($(this).val() == 0) {
                                    $(this).css("border-color", "red");
                                    counter++;
                                }
                            });
                            if (counter > 0) {
                                swal
                                ({
                                    title: '',
                                    text: 'با توجه به اینکه حالت '+title+' را انتخاب نموده اید باید اندازه های طول و عرض را وارد نمایید',
                                    type: 'warning',
                                    confirmButtonText: "بستن"
                                })
                                return false;
                            }
                        }
                        if(title ==  'مربع' || title== 'مثلث') {
                            $(".side").each(function () {
                                if ($(this).val() == 0) {
                                    $(this).css("border-color", "red");
                                    counter++;
                                }
                            });
                            if (counter > 0) {
                                swal
                                ({
                                    title: '',
                                    text: 'با توجه به اینکه حالت '+title+' را انتخاب نموده اید باید اندازه ی یک ضلع را وارد نمایید',
                                    type: 'warning',
                                    confirmButtonText: "بستن"
                                })
                                return false;
                            }
                        }
                        if(title ==  'دایره') {
                            $(".circle").each(function () {
                                if ($(this).val() == 0) {
                                    $(this).css("border-color", "red");
                                    counter++;
                                }
                            });
                            if (counter > 0) {
                                swal
                                ({
                                    title: '',
                                    text: 'با توجه به اینکه حالت '+title+' را انتخاب نموده اید باید اندازه ی قطر را وارد نمایید',
                                    type: 'warning',
                                    confirmButtonText: "بستن"
                                })
                                return false;
                            }
                        }

                    },
                    success  : function(res) {
                        if (res.code == 1)
                        {
                            $.ajax
                            ({
                                url: "{{url('api/v1/getSizes')}}/" + id,
                                type: "get",
                                dataType: "json",
                                success: function (response) {
                                    console.log(response);
                                    if (response != 0) {
                                        swal
                                        ({
                                            title: '',
                                            text: res.message,
                                            type:'success',
                                            confirmButtonText: "بستن"
                                        });
                                        var len = response.length;
                                        var i = 0;
                                        $('#sideways').empty();
                                        $('#sideways').append
                                        (
                                            "<option>اندازه یک ضلع</option>"
                                        );
                                        $('#diameter').empty();
                                        $('#diameter').append
                                        (
                                            "<option>قطر</option>"
                                        );
                                        $('#width').empty();
                                        $('#width').append
                                        (
                                            "<option>عرض</option>"
                                        );
                                        $('#length').empty();
                                        $('#length').append
                                        (
                                            "<option>طول</option>"
                                        );
                                        while (i < len) {
                                            $('#change').css('display', 'none');
                                            var item = $('#change1');
                                            item.css('display', 'block');
                                            $('#sideways').append
                                            (
                                                "<option >" + response[i].sideways + "</option>"
                                            );
                                            $('#diameter').append
                                            (
                                                "<option>" + response[i].diameter + "</option>"
                                            );
                                            $('#width').append
                                            (
                                                "<option>" + response[i].width + "</option>"
                                            );
                                            $('#length').append
                                            (
                                                "<option>" + response[i].length + "</option>"
                                            );
                                            i++;
                                        }
                                        $('#reg').css('display','none');
                                        $('#newSize').css('display','block');
                                    }
                                },error : function(error)
                                {
                                    console.log(error);
                                }
                            })
                        }
                    },error : function (error)
                    {
                        console.log(error);
                    }
                })
            })
        </script>
        <!-- below script is related to get sizes of each model -->
        <script>
            $(function(){
                $(document).on('change','#models',function(){
                    $("[name = 'models' ]:selected ").each(function () {
                        var id = $(this).attr('content');
                        $('#title').val($(this).val());
                        if(id != null || id != '')
                        {
                            $.ajax
                            ({
                                url      : "{{url('api/v1/getSizes')}}/"+id,
                                type     : "get",
                                dataType : "json",
                                success  : function(response)
                                {
                                    if(response != 0)
                                    {
                                        var len = response.length;
                                        var i   = 0;
                                        $('#sideways').empty();
                                        $('#sideways').append
                                        (
                                            "<option>اندازه یک ضلع</option>"
                                        );
                                        $('#diameter').empty();
                                        $('#diameter').append
                                        (
                                            "<option>قطر</option>"
                                        );
                                        $('#width').empty();
                                        $('#width').append
                                        (
                                            "<option>عرض</option>"
                                        );
                                        $('#length').empty();
                                        $('#length').append
                                        (
                                            "<option>طول</option>"
                                        );
                                        while(i < len) {
                                                $('#change').css('display','none');
                                                var item = $('#change1');
                                                item.css('display','block');
                                                $('#sideways').append
                                                (
                                                    "<option>" + response[i].sideways + "</option>"
                                                );
                                                $('#diameter').append
                                                (
                                                    "<option>" + response[i].diameter + "</option>"
                                                );
                                                $('#width').append
                                                (
                                                    "<option>" + response[i].width + "</option>"
                                                );
                                                $('#length').append
                                                (
                                                    "<option>" + response[i].length + "</option>"
                                                );
                                            i++;
                                        }
                                        $('#newSize').css('display','block');
                                        $('#reg').css('display','none');
                                    }else
                                        {
                                            $('#change1').css('display','none');
                                            $('#change').css('display','block');
                                            $('#newSize').css('display','none');
                                            $('#reg').css('display','block');
                                            $('#change').empty();
                                            appendToChange();
                                        }
                                },
                                error    : function(error)
                                {
                                    console.log(error);
                                }
                            })
                        }
                    })
                })
            })
        </script>
        <!-- below script is related to handle newSize button -->
        <script>
            $(document).on('click','#newSize',function(){
               $('#change').css('display','block');
               $('#newSize').css('display','none');
                $('#reg').css('display','block');
                $('#change').empty();
                appendToChange();
            });
        </script>
        <!-- below script is to check model and size of them -->
        <script>
            function checkModelSize(title)
            {
                return false;
                var counter = 0;
                if(title == 'مستطیل')
                {
                    $(".rec").each(function() {
                        if ($(this).val() == 0) {
                            $(this).css("border-color" , "red");
                            counter++;
                        }
                    });
                        if(counter > 0)
                        {
                            swal
                            ({
                                title: '',
                                text: 'با توجه به اینکه حالت مستطیل را انتخاب نموده اید باید اندازه های طول و عرض را وارد نمایید',
                                type:'warning',
                                confirmButtonText: "بستن"
                            })
                            return false;
                        }
//                        else
//                            {
//                                return true;
//                            }
               }
// else if(title == 'مربع' || title== 'مثلث')
//                {
//                    if($('#sideways').val() == 0 )
//                    {
//                        swal
//                        ({
//                            title: '',
//                            text: 'با توجه به اینکه حالت مربع را انتخاب نموده اید باید اندازه ی یک ضلع را وارد نمایید',
//                            type:'warning',
//                            confirmButtonText: "بستن"
//                        });
//                        return false;
//                    }else
//                    {
//                        return true;
//                    }
//                }else if(title == 'دایره')
//                {
//                    if($('#diameter').val() == 0 )
//                    {
//                        swal
//                        ({
//                            title: '',
//                            text: 'با توجه به اینکه حالت دایره را انتخاب نموده اید باید اندازه ی قطر را وارد نمایید',
//                            type:'warning',
//                            confirmButtonText: "بستن"
//                        });
//                        return false;
//                    }else
//                    {
//                        return true;
//                    }
//                }
            }
        </script>
@endsection