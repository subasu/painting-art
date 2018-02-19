<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>نقاشی کوبیسم</title>
    <meta name="description" content="سایت"/>
    <meta name="keywords" content="تابلو نقاشی،کوبیسم،سایت فروش آثار هنری و نقاشی، اثر هنری کوبیسم، سبک کوبیسم"/>
    <meta name="author" content="گروه مهندسی آرتان"/>
    {{--type='text/css'>--}}
    <link rel="stylesheet" href="{{URL::asset('public/main/css/bootstrap.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{URL::asset('public/main/css/bootstrap-datetimepicker.min.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{URL::asset('public/main/css/font-awesome.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{URL::asset('public/main/css/component.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{URL::asset('public/main/css/animate.min.css')}}" type="text/css"/>

    <link rel="stylesheet" href="{{URL::asset('public/css/persianDatepicker-default.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('public/css/sweetalert.css')}}">
    <!--Menu-->

    <link rel="stylesheet" href="{{URL::asset('public/main/css/menu.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{URL::asset('public/main/css/style.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{URL::asset('public/main/css/cycleslider.css')}}">
    <link rel="stylesheet" href="{{URL::asset('public/main/css/slicknav.css')}}">
    <link rel="stylesheet" href="{{URL::asset('public/main/css/colors/color1.css')}}" id="color" type="text/css"/>

    <!-- settings-panel Demo Purpose css -->
    <link type="text/css" rel="stylesheet" href="{{URL::asset('public/main/settings/settings.css')}}"/>
    <link rel="shortcut icon" href="{{URL::asset('public/main/assets/images/favicon.html')}}"/>
    <link rel="apple-touch-icon" href="{{URL::asset('public/main/assets/images/apple_touch_icon.html')}}"/>
    <link rel="apple-touch-icon" sizes="72x72"
          href="{{URL::asset('public/main/assets/images/apple_touch_icon_72x72.html')}}"/>
    <link rel="apple-touch-icon" sizes="114x114"
          href="{{URL::asset('public/main/assets/images/apple_touch_icon_114x114.html')}}"/>

    <script src="{{URL::asset('public/main/js/jquery-1.11.1.min.js')}}"></script>
    <script src="{{URL::asset('public/main/js/jquery-ui.min.js')}}"></script>

    <script type="text/javascript" src="{{URL::asset('public/main/js/modernizr.custom.js')}}"></script>

</head>
<body>
<!--PRELOADER-->
<section id="jSplash">
    <div id="circle"></div>
</section>
<div id="menutop"></div>

<div id="detail-prod" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="productGrid">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="productGrid">Product name</h4>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-4">
                        <img src="http://placehold.it/350x350" class="img-responsive" alt="a">
                    </div>
                    <div class="col-md-8">

                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-primary">Close</button>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--Wrapper 
=============================-->
<div id="wrapper">
    <div id="mask">

        <!--Header
    =============================-->
        <div id="header" class="header">
            <div class="menu-inner">
                <div class="container">
                    <div class="row">
                        <div class="header-table col-md-12 header-menu">
                            <!--  Logo section -->
                            <div class="brand">
                                <a href="#home" class="nav-link yekan">
                                    @if(!empty($logo))
                                        {{$logo->title}}
                                        <img src="{{URL::asset('public/dashboard/Logo/'.$logo->image_src)}}" width="100"
                                             height="45"/>
                                    @else
                                        لوگو و عنوان سایت
                                    @endif
                                </a>
                            </div>
                            <!--  // Logo section -->

                            <!-- Sub Page Menu section -->
                            <nav class="main-nav">
                                <a href="#" class="nav-toggle"></a>
                                <ul id="sub-nav" class="nav">
                                    <li><a href="#home" class="nav-link">صفحه اصلی</a></li>
                                    <li><a href="#about" class="nav-link">درباره ما</a></li>
                                    <li><a href="#category" class="nav-link">محصولات<span class="sub-toggle"></span></a>
                                    </li>
                                    <li><a href="#locations" class="nav-link">شعب<span class="sub-toggle"></span></a>
                                    </li>
                                    <li><a href="#gallery" class="nav-link">گالری</a></li>
                                    <li><a href="#loginRegister" class="nav-link">ورود / ثبت نام</a></li>
                                    <li><a href="#contactform" class="nav-link">تماس با ما<span
                                                    class="sub-toggle"></span></a></li>
                                </ul>
                            </nav>
                            <!--  // Sub Page Menu section -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- // Header
        =============================-->

        <!--Home Page
        =============================-->
        <div id="home" class="item">
            <img src="{{URL::asset('public/main/img/2.jpg')}}" alt="رستوران نیمکت داغ" class="fullBg">
            <div class="clearfix">
                <div class="header_details">
                    <div class="container">
                        @if(count($services)>0)
                            <div class="header_icons accura-header-block accura-hidden-2xs">
                                <ul class="accura-social-icons accura-stacked accura-jump accura-full-height accura-bordered accura-small accura-colored-bg clearFix">
                                    @foreach($services as $service)
                                        <li id="1" title="{{$service->title}}"><a href="#"
                                                                                  class="accura-social-icon-facebook circle"><i
                                                        class="glyphicon {{$service->icon}} fa-3x"></i></a></li>
                                        {{--<li id="2"><a href="#" class="accura-social-icon-twitter circle"><i--}}
                                        {{--class="fa fa-twitter"></i></a></li>--}}
                                        {{--<li id="3"><a href="#" class="accura-social-icon-gplus circle"><i--}}
                                        {{--class="fa fa-google-plus"></i></a></li>--}}
                                        {{--<li id="4"><a href="#" class="accura-social-icon-pinterest circle"><i--}}
                                        {{--class="fa fa-pinterest"></i></a></li>--}}
                                        {{--<li id="5"><a href="#" class="accura-social-icon-linkedin circle"><i--}}
                                        {{--class="fa fa-linkedin"></i></a></li>--}}
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="call yekan">
                            <div class="home_address yekan">
                                تهران - زعفرانیه - خیابان مقدس اردبیلی - خیابان کیهان - پلاک 13
                            </div>
                            <i class="fa fa-phone"></i>&nbsp;&nbsp;+98 21 22 22 22 22
                        </div>
                    </div>
                    <!-- Mainheader Menu Section -->
                    <div class="mainheaderslide" id="slide">
                        <div id="mainheader" class="header">
                            <div class="menu-inner">
                                <div class="container">
                                    <div class="row">
                                        <div class="header-table col-md-12 header-menu">

                                            <!--  Logo section -->
                                            <div class="brand"><a href="#home" class="nav-link yekan">
                                                    @if(!empty($logo))
                                                        {{$logo->title}}
                                                        <img src="{{URL::asset('public/dashboard/Logo/'.$logo->image_src)}}"
                                                             width="100" height="45"/>
                                                    @else
                                                        لوگو و عنوان سایت
                                                    @endif
                                                </a>
                                            </div>
                                            <!--  // Logo section -->

                                            <!-- Home Page Menu section -->
                                            <nav class="main-nav">
                                                <a href="#" class="nav-toggle"></a>
                                                <ul id="sub-nav" class="nav">
                                                    <li><a href="#home" class="nav-link">صفحه اصلی</a></li>
                                                    <li><a href="#about" class="nav-link">درباره ما</a></li>
                                                    <li><a href="#category" class="nav-link">محصولات<span
                                                                    class="sub-toggle"></span></a></li>
                                                    <li><a href="#locations" class="nav-link">شعب<span
                                                                    class="sub-toggle"></span></a></li>
                                                    <li><a href="#gallery" class="nav-link">گالری</a></li>
                                                    <li><a href="#loginRegister" class="nav-link">ورود / ثبت نام</a>
                                                    </li>
                                                    <li><a href="#contactform" class="nav-link">تماس با ما<span
                                                                    class="sub-toggle"></span></a>
                                                    </li>
                                                </ul>
                                            </nav>
                                            <!--  // Home Page Menu section -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- // Mainheader Menu Section -->
                </div>
                <div id="boxgallery" class="boxgallery" data-effect="effect-2">
                    @if(count($sliders))
                        @foreach($sliders as $slide)
                            <div class="panel"><img
                                        src="{{URL::asset('public/dashboard/sliderImages/'.$slide->image_src)}}"
                                        alt="{{$slide->title}}"/></div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <!-- // Home Page
        =============================-->

        <!--About us
        =============================-->
        <div id="about" class="item" style="background-color:#999999;">
            <img src="{{URL::asset('public/main/img/12.jpg')}}" alt="رستوران نیمکت داغ" class="fullBg">
            <div class="content">
                <div class="content_overlay"></div>
                <div class="content_inner">
                    <div class="row contentscroll">
                        <div class="container">
                            <div class="col-md-6 empty">&nbsp;</div>
                            <div class="col-md-6 content_text">
                                <h1 class="yekan a-right">درباره ما</h1>
                                <div class="clearfix pad_top13">
                                    <div class="col-md-6">

                                        {{--<div class="sub_title">--}}
                                        {{--<h4 class="yekan a-right">ساعات سرویس دهی:</h4>--}}
                                        {{--</div>--}}

                                        {{--<div class="hour_table">--}}
                                        {{--<table dir="rtl">--}}
                                        {{--<tr>--}}
                                        {{--<td class="days">شنبه - چهارشنبه</td>--}}
                                        {{--<td>11 صبح الی 11 شب</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                        {{--<td class="days">پنجشنبه</td>--}}
                                        {{--<td>9 صبح الی 12 شب</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                        {{--<td class="days">جمعه</td>--}}
                                        {{--<td>8 صبح الی 12 شب</td>--}}
                                        {{--</tr>--}}
                                        {{--</table>--}}
                                        {{--</div>--}}
                                        <div class="sub_title">
                                            <h4 class="yekan a-right">میز خود را رزرو کنید:</h4>
                                        </div>

                                        <p class="yekan a-right">
                                            با رزرو کردن میز به صورت آنلاین از تخفیف ویژه ما بهره مند شوید
                                            <br/><br><a class="button nav-link yekan" href="#category">محصولات</a>
                                        </p>

                                    </div>
                                    <div class="col-md-6" dir="rtl">
                                        <div class="right_content">
                                            <p class="row yekan t-justify">
                                                @if(!empty($aboutUs))
                                                    {!! $aboutUs !!}
                                                @endif

                                            </p>
                                            <p class="row yekan t-justify"></p>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- // About us
        =============================-->

        <!--Menu with image small
        =============================-->
        <div id="category" class="item">
            <img src="{{URL::asset('public/main/img/10.jpg')}}" alt="سایت هنری" class="fullBg">
            <div class="content">

                <div class="content_overlay"></div>
                <div class="content_inner">
                    <div class="row contentscroll">
                        <div class="container">
                            <div class="col-md-6 empty">&nbsp;</div>
                            <div class="col-md-6 content_text">
                                <div class="pad_top30 home3">
                                    <div class="col-md-12">
                                        @if(count($menu))
                                            @foreach($menu as $mnu)
                                                {{--                                                @if($mnu->hasProduct)--}}
                                                <div class="row ">
                                                    <div class="menu_content clearfix">
                                                        <div class="col-md-10 text-left">
                                                            <div class="title-splider yekan">
                                                                <h4 class="clearfix">
                                                                    <span class="right border_bottom">{{$mnu->title}}</span>
                                                                </h4></div>

                                                        </div>
                                                        <div class="col-md-2 menu_small">
                                                            <div class="row"><img
                                                                        src="{{url('public/dashboard/image/'.$mnu->image_src)}}"
                                                                        class="img-responsive img_border"
                                                                        alt=""/>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <?php $count = 1;$subCatCounts = 1;?>
                                                            @if(count($menu))
                                                                <?php $j = $subCatCounts;?>
                                                                @foreach($mnu->submenu as $submenu)
                                                                    <div class="row ">
                                                                        <div class="menu_content clearfix">
                                                                            <div class="col-md-10 text-left">
                                                                                <div class="title-splider yekan">
                                                                                    <h4 class="clearfix">
                                                                                        <a class="right border_bottom nav-link loadProduct"
                                                                                           href="#products"
                                                                                           id="{{$submenu->id}}">{{$submenu->title}}</a>
                                                                                    </h4></div>
                                                                            </div>
                                                                            <div class="col-md-2 menu_small">
                                                                                <div class="row">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                @endforeach
                                                            @endif

                                                        </div>

                                                    </div>

                                                </div>
                                                {{--@endif--}}
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- // Menu with image small
        =============================-->
        <!-- products with image small
        =============================-->
        <div id="products" class="item">
            <img src="{{URL::asset('public/main/img/10.jpg')}}" alt="سایت هنری" class="fullBg">
            <div class="content">

                <div class="content_overlay"></div>
                <div class="content_inner">
                    <div class="row contentscroll">
                        <div class="container">
                            <div class="col-md-6 empty">&nbsp;</div>
                            <div class="col-md-6 content_text">
                                <div class="pad_top30 home3">
                                    <div class="col-md-12" id="myProducts">
                                        <p class="yekan a-right">
                                            ابتدا دسته ی مورد نظر را انتخاب نمایید <br/><br><a
                                                    class="button nav-link yekan" href="#category">محصولات</a>
                                        </p>
                                    </div>

                                    <div class="col-md-12">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- // products with image small
        =============================-->

        <!-- Locations
        =============================-->
        <div id="locations" class="item">
            <img src="{{URL::asset('public/main/img/map.jpg')}}" alt="the Paxton Gipsy Hill" class="fullBg">
            <div class="content">

                <div class="content_overlay"></div>
                <div class="content_inner">
                    <div class="row contentscroll">
                        <div class="container">
                            <div class="col-md-6 empty">&nbsp;</div>
                            <div class="col-md-6 content_text">
                                <div class="clearfix">
                                    <h1 class="yekan a-right">شعب</h1>
                                    <p class="pad_top13 yekan a-right">بعضی از شعبه های ما با بیش از 20 سال سابقه آماده
                                        پذیرایی از شما عزیزان هستند. </p> <br/>

                                    <div class="clearfix content_space">
                                        <div class="clearfix location_content">
                                            <div class="row col-md-5 location-btns">
                                                <div class="location map-link"><a class="button  nav-link yekan"
                                                                                  href="#contact">نقشه</a></div>
                                                <div class="location"><a class="button  nav-link yekan"
                                                                         href="#reservation">رزرو میز</a></div>
                                            </div>

                                            <div class="row col-md-7">
                                                <div class="location-address-wrap">
                                                    <h3 class="border_bottom yekan a-right"><i
                                                                class="fa fa-map-marker"></i> تهران</h3>
                                                    <div class="clearfix location-street a-right yekan">زعفرانیه خیابان
                                                        مقدس اردبیلی<br/>خیابان کیهان پلاک 13
                                                    </div>
                                                    <div class="clearfix location-phone a-right yekan"><i
                                                                class="fa fa-phone"></i>2223 7889 021 <br/><i
                                                                class="fa fa-phone"></i>2223 5689 021
                                                    </div>
                                                    <div class="clearfix location-cateringlink a-right yekan">ظرفیت
                                                        پذیرایی 70 نفر , جای پارک مناسب .
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="clearfix location_content content_space">
                                            <div class="row col-md-5 location-btns">
                                                <div class="location map-link"><a class="button  nav-link yekan"
                                                                                  href="#contact">نقشه</a></div>
                                                <div class="location"><a class="button  nav-link yekan"
                                                                         href="#reservation">رزرو میز</a></div>
                                            </div>

                                            <div class="row col-md-7">
                                                <div class="location-address-wrap">
                                                    <h3 class="border_bottom yekan a-right"><i
                                                                class="fa fa-map-marker"></i> بابل</h3>
                                                    <div class="clearfix location-street a-right yekan">خیابان باغ فردوس<br/>پلاک
                                                        13
                                                    </div>
                                                    <div class="clearfix location-phone a-right yekan"><i
                                                                class="fa fa-phone"></i>1234567 0111 <br/><i
                                                                class="fa fa-phone"></i>7654321 0111
                                                    </div>
                                                    <div class="clearfix location-cateringlink a-right yekan">ظرفیت
                                                        پذیرایی 20 نفر , جای پارک مناسب .
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix location_content content_space">
                                            <div class="row col-md-5 location-btns">
                                                <div class="location map-link"><a class="button  nav-link yekan"
                                                                                  href="#contact">نقشه</a></div>
                                                <div class="location"><a class="button  nav-link yekan"
                                                                         href="#reservation">رزرو میز</a></div>
                                            </div>

                                            <div class="row col-md-7">
                                                <div class="location-address-wrap">
                                                    <h3 class="border_bottom yekan a-right"><i
                                                                class="fa fa-map-marker"></i> شیراز</h3>
                                                    <div class="clearfix location-street a-right yekan">خیابان
                                                        ستارخان<br/>پلاک 13
                                                    </div>
                                                    <div class="clearfix location-phone a-right yekan"><i
                                                                class="fa fa-phone"></i>3629 4426 071 <br/><i
                                                                class="fa fa-phone"></i>3629 4445 071
                                                    </div>
                                                    <div class="clearfix location-cateringlink a-right yekan">ظرفیت
                                                        پذیرایی 40 نفر , جای پارک مناسب .
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- // Locations
        =============================-->

        <!--Gallery
        =============================-->

        <div id="gallery" class="item">
            <div id="slides" class="clearfix">
                <div class="cycle-slideshow"
                     data-cycle-fx=fade
                     data-cycle-speed=1000
                     data-cycle-timeout=3000
                     data-cycle-caption-plugin=caption2
                     data-cycle-overlay-fx-out="fadeOut"
                     data-cycle-overlay-fx-in="fadeIn"
                     data-cycle-prev=".prev"
                     data-cycle-next=".next"
                >
                    <div class="cycle-overlay"></div>

                    <img src="{{URL::asset('public/main/img/2.jpg')}}" data-cycle-desc="عالی ترین کیفیت" class="fullBg"
                         alt="">
                    <img src="{{URL::asset('public/main/img/4.jpg')}}" data-cycle-desc="مناسب ترین قیمت" class="fullBg"
                         alt="">
                    <img src="{{URL::asset('public/main/img/5.jpg')}}" data-cycle-desc="غذاهای لذیذ" class="fullBg"
                         alt="">
                    <img src="{{URL::asset('public/main/img/7.jpg')}}" data-cycle-desc="بهترین طعم" class="fullBg"
                         alt="">
                </div>
                <div id="galheading" class="clearfix"><h1 class="yekan">گالری</h1></div>
                <div id="button" class="clearfix">
                    <div class="prev"><i class="fa fa-angle-left"></i></div>
                    <div class="next"><i class="fa fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <!-- // Gallery Ends
        =============================-->

        <!--Reservation
        =============================-->
        <div id="loginRegister" class="item">
            <img src="{{URL::asset('public/main/img/9.jpg')}}" alt="the Paxton Gipsy Hill" class="fullBg2">
            {{--<div style="background-size: 800px 100px; background:no-repeat url({{URL::asset('public/main/img/8.jpg')}});"  alt="the Paxton Gipsy Hill" class="fullBg"></div>--}}
            <div class="content">

                <div class="content_overlay"></div>
                <div class="content_inner">
                    <div class="row contentscroll">
                        <div class="container">
                            <div class="col-md-6 empty">&nbsp;</div>
                            <div class="col-md-6 content_text">
                                <div id="reservations">
                                    <h1 class="yekan a-right">1- ورود به پنل</h1>
                                    <form id="reservation_form" class="reserve_form loginUserForm pad_top13" action="#"
                                          method="post">
                                        {{csrf_field()}}
                                        <div class="clearfix reserve_form">
                                            <input type="text" name="cellphone"
                                                   class="validate['required'] textbox1 yekan a-right"
                                                   placeholder="* تلفن همراه : "
                                                   onfocus="this.placeholder = ''"
                                                   onBlur="this.placeholder = '* تلفن همراه :'"/>
                                            <input type="text" id="password" name="password" type="password"
                                                   class="validate['required','phone']  textbox1 yekan a-right"
                                                   placeholder="* رمز عبور : " onFocus="this.placeholder = ''"
                                                   onBlur="this.placeholder = '* رمز عبور :'"/>
                                            <i class="fa fa-refresh fa-lg fa-2x captcha-reload col-md-1" height="50"
                                               width="50"></i>
                                            <img class="captcha col-md-4" alt="captcha.png" id="captcha-image"/>
                                            <input type="" name="phone"
                                                   class="validate['required']  textbox1 yekan a-right " id="captcha"
                                                   placeholder="* کد امنیتی : " onFocus="this.placeholder = ''"
                                                   onBlur="this.placeholder = '* کد امنیتی :'"/>
                                            <input id="loginUser" value="ورود" name="Confirm" type="button"
                                                   class="submitBtn yekan a-right">
                                        </div>
                                    </form>
                                </div>
                                <br>
                                <br>
                                <div id="reservations">
                                    <h1 class="yekan a-right">2- ثبت نام</h1>
                                    <form id="reservation_form" class="reserve_form registerForm pad_top13" action="#"
                                          method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" value="user" name="frmtype">
                                        <div class="clearfix reserve_form">
                                            <input type="text" name="name" id="name"
                                                   class="validate['required'] textbox1 yekan a-right"
                                                   placeholder=" نام : "
                                                   onfocus="this.placeholder = ''"
                                                   onBlur="this.placeholder = ' نام :'"/>
                                            <input type="text" name="family" id="family"
                                                   class="validate['required'] textbox1 yekan a-right"
                                                   placeholder=" نام خانوادگی : "
                                                   onfocus="this.placeholder = ''"
                                                   onBlur="this.placeholder = ' نام خانوادگی :'"/>
                                            <input type="text" id="password" name="password"
                                                   class="validate['required'] textbox1 yekan a-right"
                                                   placeholder="* پسورد : "
                                                   onfocus="this.placeholder = ''"
                                                   onBlur="this.placeholder = '* پسورد :'"/>
                                            <input type="text" name="password_confirmation" id="password-confirm"
                                                   class="validate['required'] textbox1 yekan a-right"
                                                   placeholder="* تکرار پسورد : "
                                                   onfocus="this.placeholder = ''"
                                                   onBlur="this.placeholder = '* تکرار پسورد :'"/>
                                            <input type="text" name="email" id="email"
                                                   class="validate['required','email']  textbox1 yekan a-right"
                                                   placeholder=" ایمیل : " onFocus="this.placeholder = ''"
                                                   onBlur="this.placeholder = ' ایمیل :'"/>
                                            <input type="text" name="phone"
                                                   class="validate['required','phone']  textbox1 yekan a-right"
                                                   placeholder="* شماره همراه : " onFocus="this.placeholder = ''"
                                                   onBlur="this.placeholder = '* تلفن همراه :'"/>
                                            <input type="text" name="cellphone" id="cellphone"
                                                   class="validate['required','phone']  textbox1 yekan a-right"
                                                   placeholder="* شماره تماس : " onFocus="this.placeholder = ''"
                                                   onBlur="this.placeholder = '* شماره تماس :'"/>
                                            <input type="text" name="birth_date" id="birth_date"
                                                   class="validate['required']  textbox1 yekan a-right"
                                                   placeholder="* تاریخ تولد : " onFocus="this.placeholder = ''"
                                                   onBlur="this.placeholder = '* تاریخ تولد :'"/>
                                            <select name="capital" id="capital"
                                                    class="validate['required']  textbox1 yekan a-right"
                                                    placeholder="* استان : " onFocus="this.placeholder = ''"
                                                    onBlur="this.placeholder = '* استان :'">
                                                <option class="align-right" value="-1">لطفا استان مورد نظر خود را انتخاب
                                                    نمایید.
                                                </option>
                                                @foreach($capital as $cap)
                                                    <option class="align-right"
                                                            value="{{$cap->id}}">{{$cap->title}}</option>
                                                @endforeach                                            </select>
                                            <select name="town" id="town"
                                                    class="validate['required']  textbox1 yekan a-right"
                                                    placeholder=" شهرستان : " onFocus="this.placeholder = ''"
                                                    onBlur="this.placeholder = ' شهرستان :'">
                                            </select>
                                            <input type="text" name="zipCode" id="zipCode"
                                                   class="validate['required','phone']  textbox1 yekan a-right"
                                                   placeholder=" کد پستی : " onFocus="this.placeholder = ''"
                                                   onBlur="this.placeholder = ' کد پستی :'"/>
                                            <textarea name="address" id="address"
                                                      class="validate['required'] messagebox1 yekan a-right"
                                                      placeholder=" آدرس : " onFocus="this.placeholder = ''"
                                                      onBlur="this.placeholder = ' آدرس :'"></textarea>
                                            <i class="fa fa-refresh fa-lg fa-2x captcha-reload col-md-1" height="50"
                                               width="50"></i>
                                            <img class="captcha col-md-4" alt="captcha.png" id="captcha-image"/>
                                            <input type="" name="phone"
                                                   class="validate['required']  textbox1 yekan a-right " id="captcha"
                                                   placeholder="* کد امنیتی : " onFocus="this.placeholder = ''"
                                                   onBlur="this.placeholder = '* کد امنیتی :'"/>
                                            <input id="registerUser" value="ثبت نام" name="Confirm" type="button"
                                                   class="submitBtn yekan a-right">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- // Reservation

        =============================-->

        <!-- Contact Form
        =============================-->

        <div id="contactform" class="item">
            <img src="{{URL::asset('public/main/img/map.jpg')}}" alt="the Paxton Gipsy Hill" class="fullBg">
            <div class="content">

                <div class="content_overlay"></div>
                <div class="content_inner">
                    <div class="row contentscroll">
                        <div class="container">
                            <div class="col-md-6 empty">
                                @if(!empty($googleMap))
                                    <iframe height="500" class="col-md-12" src="{{$googleMap->iframe_tag}}"
                                            frameborder="0" style="border:0" allowfullscreen></iframe>
                                @endif
                            </div>

                            <div class="col-md-6 content_text">
                                <div id="contactforms">
                                    <h1 class="yekan a-right">تماس با ما</h1>
                                    <form id="contact_form" class="cont_form pad_top13" action="#" method="post">

                                        <div class="clearfix cont_form pad_top20">
                                            <input type="text" name="name"
                                                   class="validate['required'] textbox1 yekan a-right"
                                                   placeholder="* نام : "
                                                   onfocus="this.placeholder = ''"
                                                   onBlur="this.placeholder = '* Name :'"/>
                                            <input type="text" name="email"
                                                   class="validate['required','email']  textbox1 yekan a-right"
                                                   placeholder="* ایمیل : " onFocus="this.placeholder = ''"
                                                   onBlur="this.placeholder = '* ایمیل :'"/>
                                            <input type="text" name="phone"
                                                   class="validate['required','phone']  textbox1 yekan a-right"
                                                   placeholder="* شماره تماس : " onFocus="this.placeholder = ''"
                                                   onBlur="this.placeholder = '* شماره تماس :'"/>
                                            <textarea name="message"
                                                      class="validate['required'] messagebox1 yekan a-right"
                                                      placeholder="* متن پیغام : " onFocus="this.placeholder = ''"
                                                      onBlur="this.placeholder = '* متن پیغام  :'"></textarea>
                                            <input id="submitBtn" value="ارسال پیغام" name="Confirm" type="submit"
                                                   class="submitBtn yekan a-right">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- // Contact Form
        =============================-->


    </div>
</div>
<!-- // Wrapper =============================-->

<!--java script-->
<!-- Preloader Starts -->
<script type="text/javascript" src="{{URL::asset('public/main/js/jpreloader.min.js')}}"></script>

<script type="text/javascript" src="{{URL::asset('public/main/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('public/main/js/jquery.scrollTo.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('public/main/js/jquery.validate.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('public/main/js/bootstrap-datetimepicker.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('public/main/js/jquery.fitvids.js')}}"></script>

<!-- Tiled Sldier -->
<script type="text/javascript" src="{{URL::asset('public/main/js/classie.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('public/main/js/boxesFx.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('public/main/js/wait.js')}}"></script>


<!-- Cycle Slider Sldier -->
<script type="text/javascript" src="{{URL::asset('public/main/js/jquery.cycle.all.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('public/main/js/jquery.cycle2.caption2.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('public/main/js/jquery.slicknav.min.js')}}"></script>

<script src="{{URL::asset('public/main/js/jquery.nicescroll.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('public/main/js/jquery.mousewheel.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('public/main/js/jquery.easing.1.3.js')}}"></script>
<!-- include retina js -->
<script type="text/javascript" src="{{URL::asset('public/main/js/retina-1.1.0.min.js')}}"></script>

<!-- History.js -->
<!--[if (gte IE 10) | (!IE)]><!-->
<script type="text/javascript" src="{{URL::asset('public/main/js/jquery.history.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('public/main/js/ajaxify-html5.js')}}"></script>
<!--<![endif]-->

<script type="text/javascript" src="{{URL::asset('public/main/js/custom_general_box.js')}}"></script>

<script type="text/javascript" src="{{URL::asset('public/main/settings/settings/settings.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('public/main/settings/settings/jscolor.js')}}"></script>
<script>
    $(document).ready(function () {
        $(".mainMenu").each(function () {
            $(this).hover(function () {
                var id = $(this).attr('name');
                var token = $(this).data("token");
                $.ajax({
                    dataType: "json",
                    url: "{{url('getSubmenu')}}" + '/' + id,
                    cash: false,
                    type: "get",
                    data: {
                        "_method": 'get',
                        "_token": token
                    },
                    success: function (response) {
                        var item = $(".submenu");
                        item.empty();
                        var x = 1;
                        $.each(response.submenu, function (key, value) {
                            if (value.hasProduct == 1) {
                                if (value.catImg != null && x == 1) {
                                    item.append('<li class="block-container col-md-3 col-xs-12 float-xs-none" style="float: right">' +
                                        '<ul class="block">' +
                                        '<li class="img_container">' +
                                        '<img src="{{url('public/dashboard/image')}}/' + value.catImg + '" alt="' + value.title + '" title="' + value.title + '" >' +
                                        '</li>' +
                                        '</ul></li>')
                                }
                                x = 0;
                                var len = value.brands.length;
                                if (len != 0 || value.title == 'سایر') {
                                    if (value.title == 'سایر') {
                                        var temp = '<li class="block-container col-md-3 col-xs-12 float-xs-none" style="float: right">' +
                                            '<ul class="block">' +
                                            '<li class="link_container group_header">' +
                                            '<a href="#">سایر محصولات</a>' +
                                            '</li>';
                                        temp += '<li class="link_container" id="' + value.id + '">' +
                                            '<a href="{{url('showProducts')}}' + "/" + value.id + '">مشاهده ی سایر محصولات</a>' +
                                            '</li>';
                                        temp += '</ul>' + '</li>';
                                        item.append(temp)
                                    }
                                    else {
                                        var temp = '<li class="block-container col-md-3 col-xs-12 float-xs-none" style="float: right">' +
                                            '<ul class="block">' +
                                            '<li class="link_container group_header">' +
                                            '<a href="#">' + value.title + '</a>' +
                                            '</li>';
                                        $.each(value.brands, function (key, value) {
                                            temp += '<li class="link_container" id="' + value.id + '">' +
                                                '<a href="{{url('showProducts')}}' + "/" + value.id + ' ">' + value.title + '</a>' +
                                                '</li>';
                                        });
                                        temp += '</ul>' + '</li>'
                                        item.append(temp)
                                    }

                                }
                            }

                        });
                    }
                })
                //$(".submenu").show(100);
            });
            $(this).mouseleave(function () {
                var item = $(".mainMenu>ul");
                item.empty();
                //$(".submenu").hide(1);
            })
        })
    })
</script>

{{--logins scripts--}}
<script>
    $(document).ready(function () {
        //load cities of capital in selectbox
        var capital = $("#capital");
        $("#capital").on("change", function () {
            var cid = $(this).val();
            var token = $(this).data("token");
            $.ajax({
                url: '{{url('town')}}' + '/' + cid,
                type: 'get',
                dataType: "JSON",
                data: {
                    "id": cid,
                    "_method": 'get',
                    "_token": token
                },
                success: function (data) {
                    var item = $('#town');
                    item.empty();
                    $.each(data, function (index, value) {
                        item.append('<option value="' + value.title + '">' + value.title + '</option>');
                    });

                },
                error: function (response) {
                    console.log(response.valueOf(2));
                }
            });
        });
        captcha();
        function captcha() {
            var token = $(this).data("token");
            $.ajax({
                url: '{{url('captcha')}}',
                type: 'get',
                dataType: "JSON",
                data: {
                    "_method": 'get',
                    "_token": token
                },
                success: function (data) {
                    $(".captcha").attr("src", data)
                },
                error: function (response) {
                    console.log(response.valueOf(2));
                }
            });
        }

        $(".captcha").click(function () {
            captcha();
        });
        $(".captcha-reload").click(function () {
            captcha();
        });
        $("#registerUser").on('click', function () {
            $(".registerForm").submit(function (e) {
                e.preventDefault();
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            var formData = new FormData($(".registerForm")[0])
            $.ajax({
                url: '{{url('/register')}}',
                type: 'post',
                cache: false,
                data: formData,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function (response) {
                    var y = '';
                    if (response.data == '1') {
                        y = 'شما با مؤفقیت ثبت نام نمودید، از بخش ورود برای استفاده از پنل خود اقدام نمائید.';
                    }
                    else if (response.data == '0') {
                        y = 'متأسفانه شما ثبت نام نشدید،با بخش پشتیبانی تماس حاصل فرمائید.';
                    }
                    else {
                        $.each(response, function (key, val) {
                            y += val[0] + '\n'
                        });
                    }
                    swal({
                        title: '',
                        text: y,
                        type: "info",
                        confirmButtonText: "بستن"
                    })

                },
                error: function (response) {
                    if (response.status == 422) {
                        var x = response.responseJSON;
                        var y = '';
                        $.each(x, function (key, val) {
                            y += val[0] + '\n';//showing only the first error.
                        });
                        swal({
                            title: '',
                            text: y,
                            type: "warning",
                        })
                    }
                    else if (response.status === 421) {
                        swal({
                            title: "",
                            text: "اطلاعات شما با مؤفقیت ثبت شد، پس از تأیید شدن توسط مدیر سایت برای شما ایمیل فعال سازی ارسال خواهد شد.منتظر پیامک اطلاعیه از طرف سایت باشید.",
                            type: "warning",
                            confirmButtonText: "بستن"
                        });
                    }
                    else {
                        swal({
                            title: "",
//                                text: 'خطایی رخ داده است، لطفا با پشتیبانی تماس حاصل فرمائید',
                            text: "اطلاعات شما با مؤفقیت ثبت شد، پس از تأیید شدن توسط مدیر سایت برای شما ایمیل فعال سازی ارسال خواهد شد.منتظر پیامک اطلاعیه از طرف سایت باشید.",
                            type: "warning",
                            confirmButtonText: "بستن"
                        });
                    }
                }//error

            })//ajax
        });//onclick

        //send login form
        $("#loginUser").on('click', function () {
            $(".loginUserForm").submit(function (e) {
                e.preventDefault();
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            var formData = new FormData($(".loginUserForm")[0])
            $.ajax({
                url: '{{url('/login')}}',
                type: 'post',
                cache: false,
                data: formData,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function (data) {
                    var x = '';
                    $.each(data, function (key, val) {
                        x += val[0] + '\n'
                    });
                    console.log(data.responseText)
                    swal({
                        title: '',
                        text: x,
                        type: "info",
                        confirmButtonText: "بستن"
                    })
                    console.log(data);

                },
                error: function (response) {
                    if (response.status == 422) {
                        var x = response.responseJSON;
                        var y = '';
                        $.each(x, function (key, val) {
                            y += val[0] + '\n';//showing only the first error.
                        });
                        console.log(x)
                        if (x.cellphone == "اطلاعات ورودی با اطلاعات ذخیره شده مطابقت ندارد") {
                            swal({
                                title: '',
                                text: x.cellphone,
                                type: "warning",
                            });
                        }
                        else {
                            swal({
                                title: '',
                                text: y,
                                type: "warning",
                            });
                        }
                    }
                    else if (response.status === 421) {
                        swal({
                            title: "",
                            text: "اطلاعات شما با مؤفقیت ثبت شد، پس از تأیید شدن توسط مدیر سایت برای شما ایمیل فعال سازی ارسال خواهد شد.منتظر پیامک اطلاعیه از طرف سایت باشید.",
                            type: "warning",
                            confirmButtonText: "بستن"
                        });
                    }
                    else if (response.status != 500) {
                        location.href = '{{url('/panel')}}';
                    }
                }//error

            })//ajax
        });//onclick

    })//document.ready

</script>
<script>
    function showProductDetail(id) {
        var modalBody = $('.modal-body');
//            var id = $(this).attr('id');
        modalBody.html(id);
        console.log('1212122111111');
    }
    $(document).ready(function () {
        function formatNumber(num) {
            return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
        }

        var myProductsDiv = $("#myProducts");
        $(".loadProduct").click(function () {
            var id = $(this).attr('id');
            $.ajax({
                url: '{{url('showProducts')}}' + '/' + id,
                method: 'get',
                type: 'post',
                cache: false,
                dataType: 'json',
                success: function (response) {
                    myProductsDiv.html('');
                    $.each(response.products, function (key, value) {
                        var x = '<div class="row ">' +
                            '<div class="menu_content clearfix">' +
                            '<button type="button" class="btn btn-primary fa fa-folder-open col-md-1 btn-product-detail" onclick="showProductDetail('+value.id+')" id="' + value.id + '" data-toggle="modal" data-target="#detail-prod"></button>' +
                            '<div class="col-md-8 text-left">' +
                            '<div class="title-splider yekan">' +
                            '<h4 class="clearfix">' +
                            '<span class="right border_bottom">' + value.title + '</span>';
                        $.each(value.product_flags, function (key, flag) {
                            if (flag.active > 0) {
                                x += '<span class="left d-rtl">' +
                                    formatNumber(flag.price) +
                                    'تومان</span>';
                            }
                        });
                        x += '</h4></div>' +
                            '</div>' +
                            '<div class="col-md-2 menu_small">' +
                            '<div class="row">';
                        $.each(value.product_images, function (key, img) {
                            x += '<img src="public/dashboard/productFiles/picture/' + img.image_src + '" class="img-responsive img_border"alt=""/>';
                        });
                        x += '</div></div>' +
                            '</div></div>';
                        myProductsDiv.append(x);
                    });//end each
                },
                error: function (error) {
                    $("#myProducts").html(error);
                }
            });

        });



        $(".btn-product-detail").on("click", function () {

        });
    })
</script>
<script src="{{ URL::asset('public/js/persianDatepicker.js')}}"></script>
<script src="{{url('public/js/sweetalert.min.js')}}"></script>
{{--persianDatepicker--}}
<script>
    $('#birth_date').persianDatepicker();
</script>
</body>
</html>