@extends('master')
@section('header')
    @include('partials.default-header')
@endsection
@section('page_css')
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/dropzone.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/fileupload.css')}}"/>
@endsection
@section('content')
    <div class="container">
        <div class="row progression">
            <div class="col-md-4 step1 large-header">Step 1: Upload photo files</div>
            <div class="col-md-8 step2 large-header">Step 2: Tell us what you like about the photos</div>
        </div>
        <div class="row">
            <div class="upload-choice gallery col-md-8 selected">
                <div class="expanded">
                    <div class="upload-choice-title">Upload Photos to an Ideabook</div>
                    <div class="upload-choice-text">You can create an ideabook from photos or upload
                        your own.
                    </div>
                </div>
                <div class="collapsed vcenter">
                    <div class="upload-choice-text">Or Upload Photos to a Project</div>
                </div>
            </div>
            <div class="upload-choice col-md-4 project">
                <div class="expanded">
                    <div class="upload-choice-title">Upload Photos to a Project</div>
                    <div class="upload-choice-text">A Project is a collection of photos of your own work or products.
                        Projects are usually best organized by client, job site, or product line.
                    </div>
                </div>
                <div class="collapsed vcenter">
                    <div class="upload-choice-text">Or Upload Photos to a Project</div>
                </div>
            </div>
        </div>
        {!! Form::open(['url' => 'file-upload', 'class' => 'form-horizontal']) !!}
        <div id="project-section">
            <div class="row">
                <div class="col-md-12">
                    <h4>Project Description</h4>
                </div>
            </div>
            <div class="form-group">
                <label for="project" class="col-md-2 control-label text-left">Project</label>

                <div class="col-md-5">
                    <select id="project" class="form-control">
                        <option value="">Which project was it part of?</option>
                        <option value="0">Create a new project</option>
                        <optgroup label="Existing Projects:">
                            <option>Project 2</option>
                            <option>Project 3</option>
                        </optgroup>
                    </select>
                </div>
            </div>
        </div>
        <div id="ideabook-section">
            <div id="to-pro" class="row">
                <div class="col-md-12">
                    <b>Are you a professional?</b> <a class="boldLink colorLink" href="#">Upgrade
                        your portfolio to a FREE pro account <span class="more-icon"></span></a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h4>Select an Ideabook</h4>
                </div>
            </div>
            <div class="form-group">
                <label for="project" class="col-md-2 control-label text-left">Ideabook</label>

                <div class="col-md-5">
                    <select id="project" class="form-control">
                        <option value="">Which ideabook do you want to upload photos to?</option>
                        <option value="0">Create a new ideabook</option>
                        <optgroup label="Existing Ideabooks:">
                            <option>Ideabook 1</option>
                            <option>Ideabook 2</option>
                        </optgroup>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h4>Select Photo Files</h4>
            </div>
            <div class="col-md-6" id="upload-section">
                <div class="dropzone" id="dropzone-container">
                    <div class="fallback">
                        {!! Form::file('file', ['multiple' => 'multiple']) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-6" id="do-and-donts-section">
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
                    By uploading photos, you are approving their display by {{Config::get('app.name')}}, saying that you
                    either own the rights to the image or that you have permission or a license to do so from the
                    copyright holder, and agreeing to abide by {{Config::get('app.name')}} {!!link_to('terms', 'terms of
                    use')!!}.
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
    <script src="{{URL::asset('js/fileupload.js')}}" type="text/javascript"></script>
@endsection
@section('footer')
    @include('partials.title-only-footer')
@endsection
