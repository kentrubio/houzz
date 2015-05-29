@extends('master')
@section('header')
    @include('partials.default-header')
@endsection
@section('content')
    <div class="container">
        @include('partials.profile-info-container')
        <div class="row">
            <div class="col-md-8">{{$book->name}}</div>
            <div class="col-md-4">

                <div class="btn-group pull-right" role="group">
                    <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-th-large" aria-hidden="true"></span></button>
                    <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span></button>
                </div>
                <span class="pull-right">&nbsp;&nbsp;&nbsp;</span>
                <a class="btn btn-default pull-right" href="javascript:void(0);">
                    <i class="fa fa-envelope"></i>
                    <span>Email</span>
                </a>
                <span class="pull-right">&nbsp;&nbsp;&nbsp;</span>
                <span class="fa fa-google-plus-square fa-3x pull-right"></span>
                <span class="fa fa-twitter-square fa-3x pull-right"></span>
                <span class="fa fa-facebook-square fa-3x pull-right"></span>

            </div>
            <div class="col-md-12">

            </div>
        </div>
    </div>
@endsection
@section('footer')
    @include('partials.title-only-footer')
@endsection