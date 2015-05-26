@extends('master')
@section('header')
    @include('partials.default-header')
@endsection
@section('content')
    {!! Form::model($user, ['method' => 'PATCH', 'url' => '/social-media-settings']) !!}
    {!! Form::hidden('id') !!}
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>{{trans('app.link_to_your_social_media_profiles')}}</h3>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-md-12">
                @include('partials.form-errors')
                <div class="form-group">
                    <label for="facebook" class="control-label">{{ trans('app.facebook') }}</label>
                    {!! Form::text('profile[facebook]', null, ['class' => 'form-control', 'placeholder' => trans('app.facebook')]) !!}
                </div>
                <div class="form-group">
                    <label for="twitter" class="control-label">{{ trans('app.twitter') }}</label>
                    {!! Form::text('profile[twitter]', null, ['class' => 'form-control', 'placeholder' => trans('app.twitter')]) !!}
                </div>
                <div class="form-group">
                    <label for="google_plus" class="control-label">{{ trans('app.google_plus') }}</label>
                    {!! Form::text('profile[google_plus]', null, ['class' => 'form-control', 'placeholder' => trans('app.google_plus')]) !!}
                </div>
                <div class="form-group">
                    <label for="linkedin" class="control-label">{{ trans('app.linkedin') }}</label>
                    {!! Form::text('profile[linkedin]', null, ['class' => 'form-control', 'placeholder' => trans('app.linkedin')]) !!}
                </div>
                <div class="form-group">
                    <label for="website" class="control-label">{{ trans('app.website') }}</label>
                    {!! Form::text('profile[website]', null, ['class' => 'form-control', 'placeholder' => trans('app.website')]) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit(trans('app.update'), ['class' => 'btn btn-success col-xs-12 col-md-3']) !!}
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection

@section('page_js')
@endsection

@section('footer')
    @include('partials.title-only-footer')
@endsection
