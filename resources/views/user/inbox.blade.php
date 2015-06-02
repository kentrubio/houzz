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
                <h3>{{trans('app.messages')}}</h3>
                <hr />

                @foreach($messages as $message)
                    <div class="m-box">
                        <div><a href=""><img src=""></a></div>

                        <div>
                            <div class="m-name-box"><span class="">{{ $message->sender->first_name }} {{ $message->sender->last_name }}</span>&nbsp;<span class="m-date">{{ $message->created_at->diffForHumans() }}</span> </div>
                            
                            <div class="m-subject"><a href="/message/{{$message->id}}">{{ $message->subject }}</a></div>
                        </div>
                    </div>
                @endforeach
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
