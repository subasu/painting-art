@extends('layouts.userLayout')
@section('content')
    <!-- page content -->
    <div class="" role="main">
        <div class="">
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-10 col-xs-12 col-md-offset-1">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>ثبت سفارش جدید</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link" data-toggle="tooltip" title="جمع کردن"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link" data-toggle="tooltip" title="بستن"  ><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                            {{--<a href="{{url('admin/realStateManagement')}}" class="btn btn-warning col-md-6 col-xs-12 col-sm-12 col-md-offset-3" style="margin-bottom: 20px;display: none;" id="goAdminPage">بازگشت به مدیریت</a>--}}
                            <form id="newOrderForm" enctype="multipart/form-data" class="form-horizontal form-label-left input_mask" style="direction:rtl" >
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                        <h2 class="">عنوان :</h2>
                                        <input type="text" class="form-control" id="title" name="title">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                        <h2 class="">لطفا حالت بوم مورد نظر خود را از بین حالت های زیر انتخاب نمائید :</h2>
                                        <select id="models"  name="model" class="form-control">

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group" id="size" style="display: none;">
                                    <div class="col-md-12  form-group has-feedback">
                                        <h2 class="">اندازه های مربوط به حالت انتخاب شده :</h2>
                                            <div class='col-md-3'>
                                                <select name="sideways" id="sideways"  class='form-control col-md-12 col-sm-9 col-xs-12'>
                                                </select>
                                            </div>
                                            <div class='col-md-3'>
                                                <select name="diameter" id="diameter" class='form-control col-md-12 col-sm-9 col-xs-12'>

                                                </select>
                                            </div>
                                            <div class='col-md-3'>
                                                <select name="width" id="width"  class='form-control col-md-12 col-sm-9 col-xs-12'>

                                                </select>
                                            </div>
                                            <div class='col-md-3'>
                                                <select name="length" id="length" class='form-control col-md-12 col-sm-9 col-xs-12'>

                                                </select>
                                            </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                        <h2>در صورت لزوم میتوانید نمونه ای از طرح خود را در قالب فایل با پسوند jpg  یا  png  برای ما ارسال نمائید:</h2>
                                        <input id="file" type="file" name="file[]"  class="form-control" >
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                        <h2>لطفا توضیحات مربوط به سفارش خود را بطور کامل در کادر زیر بنویسید:</h2>
                                        <textarea id="description"  name="description"  class="form-control"  ></textarea>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button type="button" id="saveNewOrder" class="btn btn-success col-md-12" style="font-size:20px;">ثبت سفارش</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <script>
            $(function () {
                var option = '';
                $.ajax
                ({
                    url      : "{{url('api/v1/getModels')}}",
                    type     : "get",
                    dataType : "json",
                    success  : function(response)
                    {
                        console.log(response);
                        $.each(response,function (key,value) {
                            $('#models').empty();
                            $('#models').append
                            (
                              "<option>لطفا از بین حالت های موجود یک حالت را انتخاب نمائید و سپس اندازه آن را نیز مشخص کنید</option>"
                            );
                            $('#models').append
                            (
                               option +=  "<option  name='models' id='"+value.id+"'>"+value.title+"</option>"
                            );
                        })
                    },
                    error    : function(error)
                    {
                        console.log(error);
                    }
                })
            })
        </script>
        <script>
            $(function(){
                $(document).on('change','#models',function(){
                    $("[name = 'models' ]:selected ").each(function () {
                        var id = $(this).attr('id');
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
                                            var item = $('#size');
                                            item.css('display','block');
                                            $('#sideways').append
                                            (
                                                "<option >" + response[i].sideways + "</option>"
                                            );
                                            $('#diameter').append
                                            (
                                                "<option >" + response[i].diameter + "</option>"
                                            );
                                            $('#width').append
                                            (
                                                "<option >" + response[i].width + "</option>"
                                            );
                                            $('#length').append
                                            (
                                                "<option >" + response[i].length + "</option>"
                                            );
                                            i++;
                                        }
                                    }else
                                    {

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
        <script>
            $(document).on('click','#saveNewOrder',function(){

                var formData = new FormData($('#newOrderForm')[0]);
                $.ajax
                ({
                    cache       : false,
                    url         : "{{url('user/saveNewOrder')}}",
                    type        : "post",
                    processData : false,
                    contentType : false,
                    dataType    : "json",
                    data        : formData,
                    success     : function(response)
                    {
                       if (response.code == 'success')
                       {
                           swal
                           ({
                               title: '',
                               text: response.message,
                               type:'success',
                               confirmButtonText: "بستن"
                           });
                       }else
                           {
                               swal
                               ({
                                   title: '',
                                   text: response.message,
                                   type:'warning',
                                   confirmButtonText: "بستن"
                               });
                           }
                    },
                    error       : function(error)
                    {
                          console.log(error);
                        swal
                        ({
                            title: '',
                            text: 'خطایی رخ داده است ، لطفا با بخش پشتیبانی تماس بگیرید',
                            type:'warning',
                            confirmButtonText: "بستن"
                        });
                    }
                });
            })
        </script>
@endsection
