@extends('master')
@section('header')
    @include('partials.default-header')
@endsection
@section('content')
    <div class="container">
         @include('partials.profile-info-container')
        
        <div class="row">

            <div class="col-md-2">
                @include('partials.user-messages-nav')
            </div>

            <div class="col-md-10">
                
                {{$message->id}}
                {{$message->subject}}
                {{$message->created_at->diffForHumans()}}
            </div>
        </div>

                <div class="row div-spacer">
                    &nbsp;
                </div>
    </div>
@endsection

@section('page_js')
    <script src="{{URL::asset('js/contact.js')}}" type="text/javascript"></script>
@endsection

@section('footer')
    @include('partials.title-only-footer')
@endsection
