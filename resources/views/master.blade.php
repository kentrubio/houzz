<!DOCTYPE html>
<html lang="{{Session::get('locale')}}" class="">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# object: http://ogp.me/ns/object# article: http://ogp.me/ns/article# profile: http://ogp.me/ns/profile#">
    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="{{Session::get('locale')}}">
    <title>{{$page_title}} - Houzz</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css"/>

    <!-- application master css -->
    <link rel="stylesheet" href="{{URL::asset('css/app.css')}}" type="text/css"/>
    <!-- page custom css -->
    @yield('page_css')
</head>
<body>
<div id="class-container">
    <div id="page-header">
        @yield('header')
    </div>
    <div id="page-content">
        @yield('content')
    </div>
    <div id="page-footer">
        @yield('footer')
    </div>
</div>
<!-- Latest compiled and minified JavaScript -->
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

<!--application master javascript-->
<script type="text/javascript" src="{{URL::asset('js/app.js')}}"></script>
<!--page custom javascript-->
@yield('page_js')
</body>
</html>
