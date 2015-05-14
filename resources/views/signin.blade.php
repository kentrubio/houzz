@extends('master')
@section('header')
    @include('partials.title-only-header')
@endsection
@section('content')
    <div class="custom-modal" style="width:780px; margin:80px auto;">

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
            {{--<div class="col-sm-offset-2 col-sm-10">--}}
            <div class="col-sm-12">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember"> Remember me
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="form-control btn btn-success">Sign In</button>
        </div>
        {!! Form::close() !!}
    </div>

@endsection

@section('footer')
    @include('partials.title-only-footer')
@endsection