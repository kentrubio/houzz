@extends('master')
@section('header')
    @include('partials.default-header')
@endsection
@section('content')
    {!! Form::model($user, ['method' => 'PATCH', 'url' => '/edit-profile']) !!}
    {!! Form::hidden('id') !!}
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>{{trans('app.account_information')}}</h3>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-md-12">
                @include('partials.form-errors')
                <div class="form-group">
                    <label for="username" class="control-label">{{ trans('app.username') }}</label>
                    <div class="input-group">
                        {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => trans('app.username')]) !!}
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="button">Edit</button>
                         </span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="control-label">{{ trans('app.email') }} <small>(private)</small></label>
                    <div class="input-group">
                        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => trans('app.email')]) !!}
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="button">Edit</button>
                         </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3>{{trans('app.profile_information')}}</h3>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-md-12">
                @include('partials.form-errors')
                <div class="form-group">
                    <label for="first_name" class="control-label">{{ trans('app.first_name') }} <small>(publicly displayed)</small></label>
                    {!! Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => trans('app.first_name')]) !!}
                </div>
                <div class="form-group">
                    <label for="last_name" class="control-label">{{ trans('app.last_name') }} <small>(publicly displayed)</small></label>
                    {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => trans('app.last_name')]) !!}
                </div>
                <div class="form-group">
                    <label for="about_me" class="control-label">{{ trans('app.about_me') }}</label>
                    {!! Form::textarea('profile[about_me]', null, ['class' => 'form-control', 'size' => '10x3', 'placeholder' => trans('app.about_me')]) !!}
                </div>
                <div class="form-group">
                    <label for="my_favorite_style" class="control-label">{{ trans('app.my_favorite_style') }}</label>
                    {!! Form::text('profile[my_favorite_style]', null, ['class' => 'form-control', 'placeholder' => trans('app.my_favorite_style')]) !!}
                </div>
                <div class="form-group">
                    <label for="my_next_project" class="control-label">{{ trans('app.my_next_project') }}</label>
                    {!! Form::textarea('profile[my_next_project]', null, ['class' => 'form-control', 'size' => '10x3', 'placeholder' => trans('app.my_next_project')]) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit(trans('app.update'), ['class' => 'btn btn-success col-xs-12 col-md-3']) !!}
                </div>
            </div>
        </div>
    </div>
{!! Form::close() !!}
@endsection
@section('footer')
    @include('partials.title-only-footer')
@endsection
