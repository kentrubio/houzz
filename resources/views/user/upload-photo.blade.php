@extends('master')
@section('header')
    @include('partials.default-header')
@endsection
@section('page_css')
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/dropzone.css')}}"/>
@endsection
@section('content')
    <div class="container" style="margin:50px auto;">
        <div class="row">
            <div class="col-md-12">
                <h4>Project Description</h4>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <h4>Select Photo Files</h4>
            </div>
            <div class="col-md-6">
                <form action="/file-upload" class="dropzone">
                    <div class="fallback">
                        <input name="file" type="file" multiple/>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6 padding-zero">
                        <div class="bg-success text-success padding-five">
                            DO UPLOAD
                        </div>
                        <div>
                            <p>Photos of residential spaces.</p>
                            <p>Large Photos(1000 pixels wide or more)</p>
                            <p>JPEG, GIF, PNG, or 1-Page TIFF file formats</p>
                            <p>Good Quality photos</p>
                        </div>
                    </div>
                    <div class="col-md-6 padding-zero">
                        <div class="bg-danger text-danger padding-five">
                            DON'T UPLOAD
                        </div>
                        <div>
                            <p>Photos of commerical or office spaces.</p>
                            <p>Small Photos</p>
                            <p>PDF, Multi-Page TIFF, or EPS file formats</p>
                            <p>Low Quality photos</p>
                        </div>
                    </div>
                    <div class="col-md-12 padding-zero margin-zero">
                        Photos that do not meet these guidelines will be removed.
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
@section('page_js')
    <script src="{{URL::asset('js/dropzone.js')}}" type="text/javascript"></script>
@endsection
@section('footer')
    @include('partials.title-only-footer')
@endsection
