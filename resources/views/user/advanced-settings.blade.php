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

                <h3>Email notification:</h3>

                <div class="form-group">
                    <input type="checkbox" name="email[newsletter]" value="1" {{array_key_exists('newsletter', $email_notification) ? 'checked' : ''}}> Subscribe to the Houzz Newsletter.<br>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="email[general_updates]" value="1" {{array_key_exists('general_updates', $email_notification) ? 'checked' : ''}}> Subscribe to general updates, promotions and research emails.<br>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="email[shop]" value="1" {{array_key_exists('shop', $email_notification) ? 'checked' : ''}}> Subscribe to the Shop Houzz Newsletter.<br>
                </div>

                <h3>Send me an email when:</h3>

                @foreach($send_email_when as $key => $values)

                    <div class="form-group">
                        <label for="{{$key}}" class="control-label">{{ trans('app.'.$key) }}</label>
                        <select name="{{$key}}" class="form-control" id="{{$key}}">
                        @foreach($values as $k => $value)

                            <option value="{{$k}}" {{(array_key_exists($key, $advanced_settings) and ($advanced_settings[$key] == $k)) ? 'selected' : ''}}>{{trans('app.'.$value)}}</option>
                        @endforeach
                        </select>
                    </div>
                @endforeach

                <h3>My Profile Pages</h3>
                <h4>The following will be visible on my public profile page, and shared with my followers:</h4>
                <div class="form-group">
                    <input type="checkbox" name="visible_to_public[books]" value="1" {{array_key_exists('books', $visible_to_public) ? 'checked' : ''}}> My public books.<br>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="visible_to_public[uploaded]" value="1" {{array_key_exists('uploaded', $visible_to_public) ? 'checked' : ''}}> My uploaded photos and projects.<br>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="visible_to_public[discussions]" value="1" {{array_key_exists('discussions', $visible_to_public) ? 'checked' : ''}}> My discussions.<br>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="visible_to_public[social_media]" value="1" {{array_key_exists('social_media', $visible_to_public) ? 'checked' : ''}}> My social media profiles.<br>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="visible_to_public[followers]" value="1" {{array_key_exists('followers', $visible_to_public) ? 'checked' : ''}}> People who follow me.<br>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="visible_to_public[following]" value="1" {{array_key_exists('following', $visible_to_public) ? 'checked' : ''}}> People I follow.<br>
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
