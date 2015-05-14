@extends('master')

@section('content')
    <div class="custom-modal">

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