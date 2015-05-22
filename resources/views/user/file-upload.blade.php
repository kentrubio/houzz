@extends('master')
@section('header')
    @include('partials.default-header')
@endsection
@section('page_css')
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/dropzone.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/jquery.tagsinput.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/fileupload.css')}}"/>
@endsection
@section('content')
    <div class="container">
        <div class="row progression">
            <div class="col-md-4 step1 large-header">Step 1: Upload photo files</div>
            <div class="col-md-8 step2 large-header">Step 2: Tell us what you like about the photos</div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="upload-choice selected col-md-8" id="book">
                    <div class="expanded">
                        <div class="upload-choice-title">Upload Photos to an Ideabook</div>
                        <div class="upload-choice-text">You can create an ideabook from photos or upload
                            your own.
                        </div>
                    </div>
                    <div class="collapsed">
                        <div class="upload-choice-text">Or Upload Photos to a Project</div>
                    </div>
                </div>
                <div class="upload-choice col-md-4" id="project">
                    <div class="expanded">
                        <div class="upload-choice-title">Upload Photos to a Project</div>
                        <div class="upload-choice-text">A Project is a collection of photos of your own work or
                            products.
                            Projects are usually best organized by client, job site, or product line.
                        </div>
                    </div>
                    <div class="collapsed">
                        <div class="upload-choice-text">Or Upload Photos to a Project</div>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::open()!!}
        {!! Form::hidden('upload_to', $upload_to, ['id' => 'upload-to', 'class' => 'form-data']) !!}
        <div id="project-section">
            <div class="row">
                <div class="col-md-12">
                    <h4>Project Description</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 padding-five">
                    <div class="form-group">
                        <label for="select-project" class="col-md-2 control-label text-left">Project</label>

                        <div class="col-md-5">
                            <select id="select-project" name="project" class="form-control form-data">
                                <option value="">Which project was it part of?</option>
                                <option value="0">Create a new project</option>
                                <optgroup label="Existing Projects:">
                                    @foreach($projects as $project)
                                        <option value="{{$project->id}}">{{$project->name}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row display-none" id="create-project">
                <div class="col-md-12 padding-five">

                    <div class="form-group">
                        <label for="project-name" class="col-md-2 control-label text-left">New Project Name</label>

                        <div class="col-md-5">
                            <input type="text" name="project_name" class="form-control form-data">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 padding-five">

                    <div class="form-group">
                        <label for="category" class="col-md-2 control-label text-left">Category</label>
                        <div class="col-xs-5">
                            <label for="category-1" class="radio-inline"><input id="category-1" type="radio" name="category" checked="checked" value="1">Category 1</label>
                            <label for="category-2" class="radio-inline"><input id="category-2" type="radio" name="category" value="2">Category 2</label>
                            <label for="category-3" class="radio-inline"><input id="category-3" type="radio" name="category" value="3">Category 3</label>
                            <label for="category-4" class="radio-inline"><input id="category-4" type="radio" name="category" value="5">Category 4</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 padding-five">

                    <div class="form-group">
                        <label for="styles" class="col-md-2 control-label text-left">Style</label>

                        <div class="col-md-5">
                            <select name="style" class="form-control form-data">
                                <option value="">What is the style of the space?</option>
                                <option>Style 2</option>
                                <option>Style 3</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 padding-five">

                    <div class="form-group">
                        <label for="country" class="col-md-2 control-label text-left">Style</label>

                        <div class="col-md-5">
                            <select name="country" class="form-control form-data">
                                <option value="">Select Country</option>
                                <option>Country 2</option>
                                <option>Country 3</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 padding-five">

                    <div class="form-group">
                        <label for="city" class="col-md-2 control-label text-left">City</label>

                        <div class="col-md-5">
                            <input type="text" name="city" class="form-control form-data">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 padding-five">

                    <div class="form-group">
                        <label for="zip" class="col-md-2 control-label text-left">Zip</label>

                        <div class="col-md-5">
                            <input type="text" name="zip" class="form-control form-data">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 padding-five">

                    <div class="form-group">
                        <label for="link" class="col-md-2 control-label text-left">Link to web site</label>

                        <div class="col-md-5">
                            <input type="text" name="link" class="form-control form-data">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 padding-five">
                    <div class="form-group">
                        <label for="keywords" class="col-md-2 control-label text-left">Keywords</label>

                        <div class="col-md-5">
                            <input type="text" id="keywords" name="keywords" class="form-control form-data">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 padding-five">
                    <div class="form-group">
                        <label for="credit" class="col-md-2 control-label text-left">Photo Credit</label>

                        <div class="col-md-5">
                            <input type="text" name="credit" class="form-control form-data">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="book-section">
            <div id="to-pro" class="row">
                <div class="col-md-12">
                    <b>Are you a professional?</b> <a class="boldLink colorLink" href="#">Upgrade
                        your portfolio to a FREE pro account <span class="more-icon"></span></a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h4>Select a book</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 padding-five">

                    <div class="form-group">
                        <label for="select-book" class="col-md-2 control-label text-left">Ideabook</label>

                        <div class="col-md-5">
                            <select id="select-book" name="book" class="form-control form-data">
                                <option value="">Which ideabook do you want to upload photos to?</option>
                                <option value="0">Create a new ideabook</option>
                                <optgroup label="Existing Ideabooks:">
                                    @foreach($books as $book)
                                        <option value="{{$book->id}}">{{$book->name}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row display-none" id="create-book">
                <div class="col-md-12 padding-five">

                    <div class="form-group">
                        <label for="book-name" class="col-md-2 control-label text-left">New ideabook Name</label>

                        <div class="col-md-5">
                            <input type="text" name="book_name" class="form-control form-data">
                        </div>
                    </div>
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
            <div class="col-md-6" id="dos-and-donts-section">
                <div class="row">
                    <div class="col-md-12">
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
        <div class="row">
            <div class="col-md-12">
                <div class="margin-top-twenty">
                    By uploading photos, you are approving their display by {{Config::get('app.name')}}, saying that you
                    either own the rights to the image or that you have permission or a license to do so from the
                    copyright holder, and agreeing to abide by {{Config::get('app.name')}} {!!link_to('terms', 'terms of
                    use')!!}.
                </div>
                <div class="margin-tb-twenty">
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
    <script src="{{URL::asset('js/jquery.tagsinput.js')}}" type="text/javascript"></script>
@endsection
@section('footer')
    @include('partials.title-only-footer')
@endsection
