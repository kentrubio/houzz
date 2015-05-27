@extends('master')
@section('header')
    @include('partials.default-header')
@endsection
@section('content')
    {!! Form::model($user, ['method' => 'PATCH', 'url' => '/edit-contact']) !!}
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
                    {!! Form::text('city', isset($user->profile->city) ? $user->profile->city : null, ['class' => 'form-control', 'placeholder' => trans('app.city')]) !!}
                </div>
                <div class="form-group">
                    <label for="country" class="control-label">{{ trans('app.country') }} <small>(publicly displayed)</small></label>
                    {{--{!! Form::text('country', null, ['class' => 'form-control', 'placeholder' => trans('app.country')]) !!}--}}
                    {!! Form::select('country_code', App\Eloquent\Country::listsWithPlaceholder('name', 'code'), isset($user->profile->country_code) ? $user->profile->country_code : null, ['class' => 'form-control', 'id' => 'country_code']) !!}

                </div>
                <div class="form-group">
                    <label for="state_code" class="control-label">{{ trans('app.state_county_province') }}</label>
                    {!! Form::select('state_code', App\Eloquent\State::listsWithPlaceholder('name', 'code'), isset($user->profile->state_code) ? $user->profile->state_code : null, ['class' => 'form-control', 'id' => 'state_code']) !!}
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
    <script src="{{URL::asset('js/contact.js')}}" type="text/javascript"></script>
@endsection

@section('footer')
    @include('partials.title-only-footer')
@endsection
