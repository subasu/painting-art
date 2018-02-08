<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="description" content=""/>
    <meta name="author" content="roussounelos nikos"/>

    <link rel="icon" href="{{URL::asset('public/main/images/favicon.ico')}}" type="image/x-icon"/>
    <link rel="shortcut icon" href="{{URL::asset('public/main/images/favicon.ico')}}" type="image/x-icon"/>

    <link rel="stylesheet" type="text/css" media="all" href="{{URL::asset('public/main/css/skeleton/skeleton.css')}}"/>
    <!-- skeleton grid implementation -->
    <link rel="stylesheet" type="text/css" media="all" href="{{URL::asset('public/main/css/tipsy.css')}}"/>
    <!-- Tipsy implementation -->
    <link rel="stylesheet" type="text/css" media="all" href="{{URL::asset('public/main/css/jquery.mCustomScrollbar.css')}}"/>
    <!-- mCustomScrollbar implementation -->
    <link rel="stylesheet" type="text/css" media="all" href="{{URL::asset('public/main/css/nivo-slider.css')}}"/>
    <!-- nivo slider implementation -->
    <link rel="stylesheet" type="text/css" media="all" href="{{URL::asset('public/main/css/default/default.css')}}"/>
    <!-- nivo slider theme -->
    <link id="main-stylesheet" rel="stylesheet" type="text/css" media="all"
          href="{{URL::asset('public/main/css/colours/red.css')}}"/> <!-- main stylesheet -->
    <link rel="stylesheet" type="text/css" media="all" href="{{URL::asset('public/main/css/responsive.css')}}"/>
    <!-- CSS file that handles respnsiveness -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,700,700italic,800,800italic,300italic,300|Open+Sans+Condensed:300,300italic,700'
          rel='stylesheet' type='text/css'/> <!-- Google Fonts -->

    <!--[if lt IE 9]>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('public/main/css/iefix.css')}}"/>
    <![endif]-->

    <title>Asgard - Elegant, animated portfolio and blog template</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>

<body>

<div id="wrapper">

    <!-- menu wrapper -->
    <div id="menu-wrapper">
        <!-- logo at top -->
        <div id="logo-wrapper">
            <a href="#"><img id="logo" src="{{URL::asset('public/main/images/logo.png')}}" alt="logo"/></a>
            <img src="{{URL::asset('public/main/images/universal-preloader.gif')}}" id="loader" alt="loader"/>
            <div id="percentage">0%</div>
        </div>
        <!-- logo at top -->

        <!-- normal menu - menu items -->
        <div id="menu">

            <div class="menu-item">
                <div class="menu-background"></div>
                <a href="{{url('test')}}">خانه</a>
            </div>

            <div class="menu-item">
                <div class="menu-background"></div>
                <a href="#">نمونه کارها</a>
                <img class="has-submenu" src="{{URL::asset('public/main/images/has-submenu.png')}}" alt="has-submenu"/>

                <!-- submenu -->
                <div class="menu-item">
                    <a href="{{url('test')}}">مصالح ساختمانی نمونه کارها</a>
                    <a href="{{url('test')}}">نمونه کارهای ساده</a>
                </div>
                <!-- submenu -->
            </div>

            <div class="menu-item">
                <div class="menu-background"></div>
                <a href="#">تایپوگرافی</a>
            </div>

            <div class="menu-item">
                <div class="menu-background"></div>
                <a href="#">گالری</a>
                <img class="has-submenu" src="{{URL::asset('public/main/images/has-submenu.png')}}" alt="has-submenu"/>

                <!-- submenu -->
                <div class="menu-item">
                    <a href="#">2 ستون گالری</a>
                    <a href="#">3 ستون گالری</a>
                    <a href="#">4 ستون گالری</a>
                </div>
                <!-- submenu -->
            </div>

            <div class="menu-item">
                <div class="menu-background"></div>
                <a href="#">ویژگی </a>
                <img class="has-submenu" src="{{URL::asset('public/main/images/has-submenu.png')}}" alt="has-submenu"/>

                <!-- submenu -->
                <div class="menu-item">
                    <a href="#">تمام صفحه</a>
                    <a href="#">درباره ما</a>
                    <a href="#">صفحه خطا 404</a>
                    <a href="#">تنوع رنگ</a>
                </div>
                <!-- submenu -->
            </div>

            <div class="menu-item">
                <div class="menu-background"></div>
                <a href="#">وبلاگ</a>
                <img class="has-submenu" src="{{URL::asset('public/main/images/has-submenu.png')}}" alt="has-submenu"/>

                <!-- submenu -->
                <div class="menu-item">
                    <a href="#">پست وبلاگ</a>
                    <a href="#">لیست وبلاگ</a>
                    <a href="#">معماری لیست وبلاگ</a>
                </div>
                <!-- submenu -->
            </div>

            <div class="menu-item">
                <div class="menu-background"></div>
                <a href="#">تماس با ما</a>
            </div>

            <div class="menu-item">
                <div class="menu-background"></div>
                <a href="#">خرید</a>
            </div>

        </div>
        <!-- normal menu - menu items -->

        <!-- smaller screen menu - menu items -->
        <div id="tablet-menu">
            <select>
                <option/>
                لطفا یک منو را انتخاب نمایید
                <option value="#home"/>
                خانه
                <option value="#"/>
                نمونه کارها
                <option value="#masonry-portfolio"/>
                ++ مصالح ساختمانی نمونه کارها
                <option value="#simple-portfolio"/>
                ++ نمونه کارهای ساده
                <option value="#typography"/>
                تایپو گرافی
                <option value="#"/>
                نمونه کارها
                <option value="#2-column-gallery"/>
                ++ 2 ستون نمونه کارها
                <option value="#3-column-gallery"/>
                ++ 3 ستون نمونه کارها
                <option value="#4-column-gallery"/>
                ++ 4 ستون نمونه کارها
                <option value="#"/>
                امکانات
                <option value="#full-width"/>
                ++ تمام صفحه
                <option value="#about"/>
                ++درباره ما
                <option value="#404"/>
                ++ صفحه خطا 404
                <option value="#colors"/>
                ++ تنوع رنگ
                <option value="#"/>
                وبلاگ
                <option value="#blog-item"/>
                ++ پست وبلاگ
                <option value="#blog-list"/>
                ++ پست وبلاگ
                <option value="#masonry-blog-list"/>
                ++ معماری لیست وبلاگ
                <option value="#contact"/>
                تماس
                <option value="#"/>
                خرید
            </select>
        </div>
        <!-- smaller screen menu - menu items -->

        <!-- social icons -->
        <div id="social-wrapper">
            <a class="with-tooltip" href="#!" title="Our RSS feed"><img
                        src="{{URL::asset('public/main/images/icons/60-Mono-Social-Media-Icons-by-artbees/PNG/rss.png')}}"
                        alt="rss"/></a>
            <a class="with-tooltip" href="#!" title="Follow us on twitter"><img
                        src="{{URL::asset('public/main/images/icons/60-Mono-Social-Media-Icons-by-artbees/PNG/twitter.png')}}"
                        alt="twitter"/></a>
            <a class="with-tooltip" href="#!" title="Like us on Facebook"><img
                        src="{{URL::asset('public/main/images/icons/60-Mono-Social-Media-Icons-by-artbees/PNG/facebook.png')}}"
                        alt="facebook"/></a>
            <a class="with-tooltip" href="#!" title="Hear from us on Tumblr"><img
                        src="{{URL::asset('public/main/images/icons/60-Mono-Social-Media-Icons-by-artbees/PNG/tumblr.png')}}"
                        alt="tumblr"/></a>
            <a class="with-tooltip" href="#!" title="Get a hold of our cloud"><img
                        src="{{URL::asset('public/main/images/icons/60-Mono-Social-Media-Icons-by-artbees/PNG/cloud.png')}}"
                        alt="cloud"/></a>
            <a class="with-tooltip" href="#!" title="Our Squidoo account"><img
                        src="{{URL::asset('public/main/images/icons/60-Mono-Social-Media-Icons-by-artbees/PNG/squidoo.png')}}"
                        alt="squidoo"/></a>
            <a class="with-tooltip" href="#!" title="Our latest photos"><img
                        src="{{URL::asset('public/main/images/icons/60-Mono-Social-Media-Icons-by-artbees/PNG/flickr.png')}}"
                        alt="flickr"/></a>
            <a class="with-tooltip" href="#!" title="Our latest videos"><img
                        src="{{URL::asset('public/main/images/icons/60-Mono-Social-Media-Icons-by-artbees/PNG/youtube.png')}}"
                        alt="youtube"/></a>
            <a class="with-tooltip" href="#!" title="See some of our CMS work"><img
                        src="{{URL::asset('public/main/images/icons/60-Mono-Social-Media-Icons-by-artbees/PNG/drupal.png')}}"
                        alt="drupal"/></a>
            <a class="with-tooltip" href="#!" title="Yelp us!"><img
                        src="{{URL::asset('public/main/images/icons/60-Mono-Social-Media-Icons-by-artbees/PNG/yelp.png')}}"
                        alt="yelp"/></a>
            <a class="with-tooltip" href="#!" title="Have some coffeine"><img
                        src="{{URL::asset('public/main/images/icons/60-Mono-Social-Media-Icons-by-artbees/PNG/metacafe.png')}}"
                        alt="metacafe"/></a>
        </div>
        <!-- social icons -->

        <!-- search bar and close -->
        <div id="menuButtons">
            <div id="hideMenu" class="menuButton menuVisible"></div>
        </div>
        <!-- search bar and close -->
    </div>
    <!-- menu wrapper -->

    <!-- main wrapper - content goes here -->
    <div id="main-wrapper">
        <!-- initial background -->
        <div class="full-width-background">
            <img src="{{URL::asset('public/main/images/backgrounds/grey4.jpg')}}" alt="grey4"/>
        </div>
        <!-- initial background -->
    </div>
    <!-- main wrapper - content goes here -->

    <!-- onclick wrapper for gallery and masonry popups -->
    <div id="onclickWrapper">

        <!-- black background -->
        <div id="onclickBackground"></div>
        <!-- black background -->

        <!-- image, video, etc on the right -->
        <div id="onclickItemWrapper"></div>
        <!-- image, video, etc on the right -->

        <!-- description on the left -->
        <div id="onclickDescriptionWrapper">
            <div>
            </div>
        </div>
        <!-- description on the left -->

        <!-- image preloader -->
        <div id="imagePreloader"></div>
        <!-- image preloader -->
    </div>
    <!-- onclick wrapper for gallery and masonry popups -->

</div>
<<<<<<< HEAD
<script type="text/javascript" src="{{URL::asset('public/main/scripts/jquery-1.11.1.min.js')}}"></script>
<!-- jQuery implementation -->
<script type="text/javascript" src="{{URL::asset('public/main/scripts/jquery-ui-1.9.1.custom.min.js')}}"></script>
<!-- jQueryUI implementation -->
<script type="text/javascript" src="{{URL::asset('public/main/scripts/jquery.easing.1.3.js')}}"></script>
<!-- jQuery easing implementation -->
<script type="text/javascript" src="{{URL::asset('public/main/scripts/jquery.tipsy.js')}}"></script> <!-- Tipsy -->
{{--<script type="text/javascript" src="http://maps.google.com/maps?file=api&amp;v=3&amp;key=AIzaSyBAuLHHG5oKcTn7PMG0jLPrhVqIZWfGSMQ"></script><!-- Google maps API -->--}}
{{--<script type="text/javascript" src="{{URL::asset('public/main/scripts/jquery.gmap-1.1.0-min.js')}}"></script><!-- Google maps GMap plugin -->--}}
<script type="text/javascript" src="{{URL::asset('public/main/scripts/jquery.animate-shadow-min.js')}}"></script>
<!-- animate shadow plugin -->
<script type="text/javascript" src="{{URL::asset('public/main/scripts/animateBackground-plugin.js')}}"></script>
<!-- animate background plugin -->
<script type="text/javascript" src="{{URL::asset('public/main/scripts/jquery.quicksand.js')}}"></script>
<!-- quickSand implementation -->

<script type="text/javascript" src="{{URL::asset('public/main/scripts/jquery.masonry.min.js')}}"></script>
<!-- Masonry plugin -->
<script type="text/javascript" src="{{URL::asset('public/main/scripts/jquery.mousewheel.min.js')}}"></script>
<!-- mousewheel plugin -->
<script type="text/javascript" src="{{URL::asset('public/main/scripts/modernizr.js')}}"></script>
<!-- modernizr plugin -->
<script type="text/javascript" src="{{URL::asset('public/main/scripts/jquery.quicksand.js')}}"></script>
<!-- quicksand plugin -->
<!-- all my custom scripts -->
<script type="text/javascript" src="{{URL::asset('public/main/scripts/jquery.nivo.slider.pack.js')}}"></script>
<!-- nivo slider packed -->
<script type="text/javascript" src="{{URL::asset('public/main/scripts/jquery.mCustomScrollbar.min.js')}}"></script>
<!-- mCustomScrollbar -->
<script type="text/javascript" src="{{URL::asset('public/main/scripts/custom-scripts.js')}}"></script>
=======
<script type="text/javascript" src="{{URL::asset('public/main/scripts/jquery-1.11.1.min.js')}}"></script> <!-- jQuery implementation -->
<script type="text/javascript" src="{{URL::asset('public/main/scripts/jquery.nivo.slider.pack.js')}}"></script> <!-- nivo slider packed -->
<script type="text/javascript" src="{{URL::asset('public/main/scripts/jquery-ui-1.9.1.custom.min.js')}}"></script> <!-- jQueryUI implementation -->
<script type="text/javascript" src="{{URL::asset('public/main/scripts/jquery.easing.1.3.js')}}"></script> <!-- jQuery easing implementation -->
<script type="text/javascript" src="{{URL::asset('public/main/scripts/jquery.tipsy.js')}}"></script> <!-- Tipsy -->
{{--<script type="text/javascript" src="http://maps.google.com/maps?file=api&amp;v=3&amp;key=AIzaSyBAuLHHG5oKcTn7PMG0jLPrhVqIZWfGSMQ"></script><!-- Google maps API -->--}}
{{--<script type="text/javascript" src="{{URL::asset('public/main/scripts/jquery.gmap-1.1.0-min.js')}}"></script><!-- Google maps GMap plugin -->--}}
<script type="text/javascript" src="{{URL::asset('public/main/scripts/jquery.animate-shadow-min.js')}}"></script><!-- animate shadow plugin -->
<script type="text/javascript" src="{{URL::asset('public/main/scripts/animateBackground-plugin.js')}}"></script><!-- animate background plugin -->
<script type="text/javascript" src="{{URL::asset('public/main/scripts/jquery.quicksand.js')}}"></script><!-- quickSand implementation -->
<script type="text/javascript" src="{{URL::asset('public/main/scripts/jquery.mCustomScrollbar.min.js')}}"></script> <!-- mCustomScrollbar -->
<script type="text/javascript" src="{{URL::asset('public/main/scripts/jquery.masonry.min.js')}}"></script> <!-- Masonry plugin -->
<script type="text/javascript" src="{{URL::asset('public/main/scripts/jquery.mousewheel.min.js')}}"></script> <!-- mousewheel plugin -->
<script type="text/javascript" src="{{URL::asset('public/main/scripts/modernizr.js')}}"></script> <!-- modernizr plugin -->
<script type="text/javascript" src="{{URL::asset('public/main/scripts/jquery.quicksand.js')}}"></script> <!-- quicksand plugin -->
<script type="text/javascript" src="{{URL::asset('public/main/scripts/custom-scripts.js')}}"></script> <!-- all my custom scripts -->

>>>>>>> af6f47a39356165e21f57b7e3f015c81792707f7
</body>
</html>
