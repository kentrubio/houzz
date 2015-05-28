<!DOCTYPE html>
<html lang="{{Session::get('locale')}}" class="">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# object: http://ogp.me/ns/object# article: http://ogp.me/ns/article# profile: http://ogp.me/ns/profile#">
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="{{Session::get('locale')}}">
    <title>{{$page_title}} - {{Config::get('app.name')}}</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{URL::asset('css/flatstrap.min.css')}}" type="text/css"/>
    <!-- Optional theme -->
    <link rel="stylesheet" href="{{URL::asset('css/flatstrap-theme.min.css')}}" type="text/css"/>
    <!-- application master css -->
    <link rel="stylesheet" href="{{URL::asset('css/app.css')}}" type="text/css"/>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <!-- page custom css -->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/style.css')}}"/>

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
    @yield('page_css')
</head>
<body>
<div class="page-container">
    <div class="page-header">
        @yield('header')
    </div>
    <div class="page-content">
        @yield('content')
    </div>
</div>

<div class="row footer-box">
    @yield('footer')
</div>
<div class="row copy-footer text-center">
    <div class="container copytext">
    <span>&copy; {{date('Y')}} {{Config::get('app.name')}}</span>
    </div>
</div>
<!-- Latest compiled and minified JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript" src="{{URL::asset('js/flatstrap.min.js')}}"></script>

<!--application master javascript-->
<script type="text/javascript" src="{{URL::asset('js/app.js')}}"></script>
<!--page custom javascript-->
@yield('page_js')
</body>
</html>
