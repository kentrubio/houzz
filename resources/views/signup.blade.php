<!DOCTYPE html>
<html lang="{{Session::get('locale')}}" class="">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# object: http://ogp.me/ns/object# article: http://ogp.me/ns/article# profile: http://ogp.me/ns/profile#">
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="{{Session::get('locale')}}">
    <title>{{$page_title}} - Houzz</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{URL::asset('css/flatstrap.min.css')}}" type="text/css"/>
    <!-- Optional theme -->
    <link rel="stylesheet" href="{{URL::asset('css/flatstrap-theme.min.css')}}" type="text/css"/>
    <!-- application master css -->
    <link rel="stylesheet" href="{{URL::asset('css/app.css')}}" type="text/css"/>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <!-- page custom css -->
</head>
<body>
<div class="modal-780 margin-top-twenty">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title text-center">{{ trans('app.welcome_to') }} {{Config::get('app.name')}}</h2>
            <h4 class="text-center">The new way to become awesome.</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-5 padding-ten-thirty">
                    @include('partials.form-errors')
                    {!! Form::open(['url' => 'signup']) !!}
                    <div class="form-group">
                        <label for="first-name">{{trans('app.first_name')}}</label>
                        <input type="text" name="first_name" id="first-name" class="form-control"
                               placeholder="{{trans('app.first_name')}}">
                    </div>
                    <div class="form-group">
                        <label for="last-name">{{trans('app.last_name')}}</label>
                        <input type="text" name="last_name" id="last-name" class="form-control" placeholder="{{trans('app.last_name')}}">
                    </div>
                    <div class="form-group">
                        <label for="email">{{trans('app.email')}}</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="{{trans('app.email')}}">
                    </div>
                    <div class="form-group">
                        <label for="password">{{trans('app.password')}}</label>
                        <input type="password" class="form-control" name="password" id="password"
                               placeholder="{{trans('app.minimum_6_characters')}}">
                    </div>
                    <div class="form-group margin-top-twenty">
                        <button type="submit" class="form-control btn btn-success">{{ trans('app.sign_up') }}</button>
                    </div>
                    <div class="margin-top-twenty">
                        By clicking "Sign Up" or "Sign In with Facebook" I acknowledge and agree to the <a href="terms"
                                                                                                           class="text-success"
                                                                                                           target="_blank">Terms
                            of Use</a> and <a href="privacy-policy" class="text-success" target="_blank">Privacy
                            Policy</a>.
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="col-md-1">
                </div>
                <div class="col-md-6 padding-ten-thirty">
                    <div>
                        <label for="facebook">&nbsp;</label>
                    </div>
                    <div class="margin-top-twenty">
                        <p>{{ trans('app.easily_share_with_facebook_friends_and_family') }}</p>
                    </div>
                    <div>
                        <a class="btn btn-primary text-left text-bold width-100" href="/oauth/facebook"
                           role="button"
                           id="facebook"><i
                                    class="fa fa-facebook"></i><span
                                    class="btn-content-section"> {{ trans('app.sign_in_with_facebook') }} </span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <p class="text-center"> {{ trans('app.already_have_an_account') }} <a href="signin" class="text-success">{{ trans('app.sign_in') }}<span
                            class="glyphicon glyphicon-chevron-right"></span></a></p>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
<!-- Latest compiled and minified JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="{{URL::asset('js/flatstrap.min.js')}}"></script>

<!--application master javascript-->
<script type="text/javascript" src="{{URL::asset('js/app.js')}}"></script>
</body>
</html>