@extends('master')
@section('header')
    @include('partials.default-header')
@endsection
@section('page_css')
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/dropzone.css')}}"/>
@endsection
@section('content')
    <div class="container">
        {!! Form::open(['url' => 'file-upload', 'class' => 'form-horizontal']) !!}
            <div class="row">
                <div class="col-md-12">
                    <h4>Project Description</h4>
                </div>
            </div>
            <div class="form-group">
                <label for="project" class="col-md-2 control-label">Project</label>
                <div class="col-md-5">
                    <select id="project" class="form-control">
                        <option value="">Which project was it part of?</option>
                        <option value="0">Create a new project</option>
                        <optgroup label="Existing Projects">
                            <option>Project 2</option>
                            <option>Project 3</option>
                        </optgroup>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h4>Select Photo Files</h4>
                </div>
                <div class="col-md-6">
                    <div class="dropzone" id="dropzone-container">
                        <div class="fallback">
                            {!! Form::file('file', ['multiple' => 'multiple']) !!}
                        </div>
                    </div>
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
            <div class="row">
                <div class="col-md-12">
                    <div class="margin-top-twenty">
                        By uploading photos, you are approving their display by {{Config::get('app.name')}}, saying that you either own the rights to the image or that you have permission or a license to do so from the copyright holder, and agreeing to abide by {{Config::get('app.name')}} {!!link_to('terms', 'terms of use')!!}.
                    </div>
                    <div class="margin-top-twenty">
                        <button type="submit" id="form-submit" class="btn btn-success">Upload</button>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
@endsection
@section('page_js')
    <script src="{{URL::asset('js/dropzone.js')}}" type="text/javascript"></script>
    <script src="{{URL::asset('js/photo.js')}}" type="text/javascript"></script>
@endsection
@section('footer')
    @include('partials.title-only-footer')
@endsection
