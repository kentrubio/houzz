@extends('master')
@section('header')
    @include('partials.default-header')
@endsection
@section('page_css')
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/showprofile.css')}}"/>
@endsection

@section('content')
    <div class="container">
        @include('partials.profile-info-container')
        <div class="row" style="height:2000px;">
            Content here!
        </div>
        
    </div>

@endsection
@section('footer')
    @include('partials.title-only-footer')
@endsection
