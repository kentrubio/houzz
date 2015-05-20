@extends('master')
@section('header')
    @include('partials.default-header')
@endsection
@section('content')
    {!! Form::model($logged_user, ['method' => 'PATCH', 'url' => '/edit-profile']) !!}
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
                <div class="input-group">
                    {!! Form::label('username', trans('app.username'), ['class' => 'control-label']) !!}
                    {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => trans('app.username')]) !!}
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="button">Edit</button>
                     </span>
                </div>
                <div class="input-group">
                    {!! Form::label('email', trans('app.email') . ' (private)', ['class' => 'control-label']) !!}
                    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => trans('app.email')]) !!}
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="button">Edit</button>
                     </span>
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
                    {!! Form::label('first_name', trans('app.first_name') . ' (publicly displayed)', ['class' => 'control-label']) !!}
                    {!! Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => trans('app.first_name')]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('last_name', trans('app.last_name') . ' (publicly displayed)', ['class' => 'control-label']) !!}
                    {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => trans('app.last_name')]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('about_me', trans('app.about_me'), ['class' => 'control-label']) !!}
                    {!! Form::text('about_me', null, ['class' => 'form-control', 'placeholder' => trans('app.about_me')]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('my_favorite_style', trans('app.my_favorite_style'), ['class' => 'control-label']) !!}
                    {!! Form::text('my_favorite_style', null, ['class' => 'form-control', 'placeholder' => trans('app.my_favorite_style')]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('my_next_house_project', trans('app.my_next_house_project'), ['class' => 'control-label']) !!}
                    {!! Form::text('my_next_house_project', null, ['class' => 'form-control', 'placeholder' => trans('app.my_next_house_project')]) !!}
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
