@extends('layouts.userLayout')
@section('content')
    <style>
        label{
            font-size: 115%;
            color: darkcyan;
        }
        .b{
            background-color: darkcyan;
            font-size: 115%;
        }
    </style>
    <!-- page content -->
    <div class="right_col" role="main">
            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>ثبت سفارش</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link" data-toggle="tooltip" title="جمع کردن"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link" data-toggle="tooltip" title="بستن"  ><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="col-md-12">
                            <br />
                            {{--<a href="{{url('admin/realStateManagement')}}" class="btn btn-warning col-md-6 col-xs-12 col-sm-12 col-md-offset-3" style="margin-bottom: 20px;display: none;" id="goAdminPage">بازگشت به مدیریت</a>--}}
                            <form id="firstForm" class="form-label-left">
                                {{csrf_field()}}
                                <div dir="rtl">
                                    <label class="text-right"> عنوان :</label>
                                </div>
                                <div class="form-group col-md-12">
                                        <input  class="form-control" id="title" placeholder="عنوان سفارش" name="title" maxlength="35" required>
                                </div>

                                <div dir="rtl">
                                    <label class="text-right">لطفا حالت تابلو خود را از بین حالت های زیر انتخاب نمایید :</label>
                                </div>
                                <div  class="form-group col-md-12">
                                    <select dir="rtl" name="degree" class="form-control">
                                            <option><strong>حالت تابلو خود را انتخاب نمائید</strong></option>
                                            <option>مستطیل</option>
                                            <option>مربع</option>
                                            <option>دایره</option>
                                            <option>مثلث</option>
                                    </select>
                                </div>
                                <div dir="rtl">
                                    <label class="text-right">برای هرچه واضح تر شدن سفارش و جزئیات آن و در صورت تمایل نمونه ای از تابلو مورد نظر خود را در قالب فایل ارسال نمائید. پسو ندهای مجاز :png , jpg</label>
                                </div>

                                <div class="form-group col-md-12">
                                    <input type="file" class="form-control" id="example"  name="example">
                                </div>
                                <div dir="rtl">
                                    <label class="text-right">لطفا جزئیات سفارش خود را بطور کامل در کادر زیر توضیح دهید :</label>
                                </div>
                                <div class="form-group col-md-12">
                                    <textarea class="form-control" maxlength="200" name="address"></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <button class="col-md-12 btn btn-dark b" >ثبت سفارش</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <script>
            $(document).on('click','#saveChangePassButton',function(){
                var formData = new FormData($('#passwordForm')[0]);
                var password = $('#password').val();
                var confirmPassword = $('#confirmPassword').val();
                var oldPassword     = $('#oldPassword').val();
                $.ajax
                ({
                    beforeSend : function () {
                        if(password !== confirmPassword)
                        {
                            swal({
                                title: "",
                                text: 'رمزهای وارد شده با هم مطابقت ندارند',
                                type: "error",
                                confirmButtonText: "بستن"
                            });
                            return false;
                        }
                        if (password == '' || password == null)
                        {
                            $('#password').focus();
                            $('#password').css('border-color','red');
                            return false;
                        }
                        if (confirmPassword == '' || confirmPassword == null)
                        {
                            $('#confirmPassword').focus();
                            $('#confirmPassword').css('border-color','red');
                            return false;
                        }
                        if (oldPassword == '' || oldPassword == null)
                        {
                            $('#oldPassword').focus();
                            $('#oldPassword').css('border-color','red');
                            return false;
                        }

                    },
                    cache : false,
                    url   : "{{url('user/saveNewPassword')}}",
                    type  : "post",
                    data  : formData,
                    contentType : false,
                    processData : false,
                    success : function (response) {
                        if(response == 'رمز عبور شما تغییر یافت')
                        {
                            swal({
                                title: "",
                                text: response,
                                type: "info",
                                confirmButtonText: "بستن"
                            });
                            setTimeout(function () {
                                window.location.href ='../logout';
                            },3000);
                        }else
                        {
                            swal({
                                title: "",
                                text: response,
                                type: "info",
                                confirmButtonText: "بستن"
                            });
                        }

                    },error : function (error) {
                        if (error.status === 422) {
                            var x = error.responseJSON;
                            var errorsHtml = '';
                            var count = 0;
                            $.each(x, function (key, value) {
                                errorsHtml += value[0] + '\n'; //showing only the first error.
                            });
                            console.log(count)
                            swal({
                                title: "",
                                text: errorsHtml,
                                type: "info",
                                confirmButtonText: "بستن"
                            });
                        }
                        if(error.status === 500)
                        {
                            swal({
                                title: "",
                                text: 'خطایی رخ داده است ، لطفا با بخش پشتیبانی تماس بگیرید',
                                type: "warning",
                                confirmButtonText: "بستن"
                            });
                            console.log(error);
                        }

                    }
                })
            });
        </script>
@endsection
