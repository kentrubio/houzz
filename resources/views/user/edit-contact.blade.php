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
                <h3>{{trans('app.contact_information')}}</h3>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-md-12">
                @include('partials.form-errors')
                <div class="form-group">
                    <label for="city" class="control-label">{{ trans('app.city') }} <small>(publicly displayed)</small></label>
                    {!! Form::text('city', null, ['class' => 'form-control', 'placeholder' => trans('app.city')]) !!}
                </div>
                <div class="form-group">
                    <label for="country" class="control-label">{{ trans('app.country') }} <small>(publicly displayed)</small></label>
                    {!! Form::text('country', null, ['class' => 'form-control', 'placeholder' => trans('app.country')]) !!}
                </div>
                <div class="form-group">
                    <label for="state" class="control-label">{{ trans('app.state') }}</label>
                    {!! Form::text('state', null, ['class' => 'form-control', 'size' => '10x3', 'placeholder' => trans('app.state')]) !!}
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
