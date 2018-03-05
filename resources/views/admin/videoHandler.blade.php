{{--@extends('layouts.adminLayout')--}}
{{--@section('content')--}}

    {{--<div class="">--}}
        {{--<button type="button" class="close" data-dismiss="modal">&times;</button>--}}
        {{--<h2 class="">مشاهده فیلم آموزشی</h2>--}}
    {{--</div>--}}
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
            <div class="col-sm-4">
                <video class="video"
                       id="video" name="video_src">
                    <source id="playingVideo"
                            src="{{url('public/dashboard/trainingVideos/'.$parameter.'.mp4')}}">
                </video>
            </div>
            <div class="col-sm-4" >
                <div class="">
                    <a id="playVideo"><button class="btn btn-success" data-toggle="" title="">پخش ویدئو آموزشی</button></a>
                </div>
                <div class="">
                    <a id="pauseVideo"><button class="btn btn-warning" data-toggle="" title="">توقف ویدئو آموزشی</button></a>
                </div>
            </div>
    </div>
</div>
</body>
</html>
<script>

    $(document).on('click', '#playVideo', function () {

        var video = document.getElementById('video');
        if (video != null) {
            video.play();
            $(this).hide();
            $('#pauseVideo').show();
        }

    })
    $(document).on('click', '#pauseVideo', function () {
        $(this).hide();
        $('#playVideo').show();
        var video = document.getElementById('video');
        video.pause();
    })

</script>
{{--@endsection--}}