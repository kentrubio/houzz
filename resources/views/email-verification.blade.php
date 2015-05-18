@extends('master')
@section('header')
    @include('partials.title-only-header')
@endsection
@section('content')
    <div class="custom-modal" style="width:780px; margin:80px auto;">
        <h4 class="bg-success text-center text-success" style="padding:10px;">{{ trans('app.email_verification_text') }}</h4>
    </div>

@endsection

@section('footer')
    @include('partials.title-only-footer')
@endsection