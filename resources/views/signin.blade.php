@extends('master')
@section('header')
    @include('partials.title-only-header')
@endsection
@section('content')
    <div class="modal-780">
        <div class="row">
            <div class="col-md-12">
                <h3>Sign In to {{Config::get('app.name')}}</h3>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-md-5 padding-ten-thirty">
                @include('partials.form-errors')

                {!! Form::open(['url' => 'signin']) !!}
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password"
                           placeholder="Minimum 6 characters">
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember"> Remember me
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success col-xs-12 col-md-3">Sign In</button>
                </div>
                {!! Form::close() !!}
            </div>
            <div class="col-md-1">
            </div>
            <div class="col-md-6 padding-ten-thirty">
                    <div>
                        <label for="facebook">&nbsp;</label>
                    </div>
                    <div>
                        <a class="btn btn-primary text-bold width-100 text-left" href="/oauth/facebook" role="button"
                           id="facebook"><i
                                    class="fa fa-facebook"></i><span
                                    class="btn-content-section">Sign In with Facebook</span></a>
                    </div>
                    <div class="margin-top-twenty">
                        <p>Don't have an account yet?</p>

                        <p><a class="text-success" href="signup">Join now <span
                                        class="glyphicon glyphicon-chevron-right"></span></a></p>
                    </div>
            </div>
        </div>

    </div>

    </div>

@endsection

@section('footer')
    @include('partials.title-only-footer')
@endsection