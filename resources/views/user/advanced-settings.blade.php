@extends('master')
@section('header')
    @include('partials.default-header')
@endsection
@section('content')
    {!! Form::model($user, ['method' => 'PATCH', 'url' => '/advanced-settings']) !!}
    {!! Form::hidden('id') !!}
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>{{trans('app.advanced_settings')}}</h3>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-md-12">
                @include('partials.form-errors')

                <div>Send me an email when:</div>

                @foreach($send_email_when as $key => $values)

                    <div class="form-group">
                        <label for="{{$key}}" class="control-label">{{ trans('app.'.$key) }}</label>
                        <select name="{{$key}}" class="form-control" id="{{$key}}">
                        @foreach($values as $k => $value)
                            <option value="{{$k}}" {{isset($advanced_settings[$key]) and $advanced_settings[$key] == $k ? 'selected' : ''}}>{{trans('app.'.$value)}}</option>
                        @endforeach
                        </select>
                    </div>
                @endforeach

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
