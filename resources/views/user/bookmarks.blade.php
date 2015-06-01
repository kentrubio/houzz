@extends('master')
@section('header')
    @include('partials.default-header')
@endsection
@section('page_css')
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/bookmarks.css')}}"/>
@endsection

@section('content')
    <div class="container">
        @include('partials.profile-info-container')
        <div class="row">
           
           <div class="col-md-7">

                <h3 class="content-title"><a href="">Boooook marks content here...</a></h3>
                
           </div>





        </div>
        
                <div class="row div-spacer">
                    &nbsp;
                </div>

    </div>

@endsection
@section('footer')
    @include('partials.title-only-footer')
@endsection
