@extends('master')
@section('header')
    @include('partials.default-header')
@endsection
@section('content')
    <div class="container">
        
        {!! Form::open(['url' => '/book/update']) !!}
        {!! Form::hidden('book_id', $book->id) !!}

        <div class="row">
            <div class="col-md-12">
                <div class="row">

                    <div class="col-md-7 ">
                        <button type="submit" class="btn btn-success" id="save-btn">{{ trans('app.done') }}</button>
                        &nbsp;
                        @if($edit_book)
                            <a class="btn btn-default" href="javascript:void(0);"
                               id="move-photos">{{ trans('app.move_photos_to') }}</a>
                            <a class="btn btn-default" href="javascript:void(0);"
                               id="copy-photos">{{ trans('app.move_photos_to') }}</a>
                        @endif
                        <a class="btn btn-default" href="javascript:void(0);"
                           id="remove-photos">{{ trans('app.remove_photos') }}</a>
                    </div>
                    @if($edit_book)
                        <div class="col-md-5 ">
                            <div class="col-md-6">
                                <a class="btn btn-danger" href="javascript:void(0);"
                                   id="delete-book">{{ trans('app.delete_book') }}</a>
                            </div>
                            <div class="col-md-6">
                                <div class="btn-group pull-right">
                                    <a id="small-view" href="javascript:void(0);" title="{{trans('app.small_view')}}"
                                       class="btn btn-default btn-small">S</a>
                                    <a id="medium-view" href="javascript:voic(0);" title="{{trans('app.medium_view')}}"
                                       class="btn btn-default btn-small active">M</a>
                                    <a id="list-view" href="javascript:void(0);" title="{{trans('app.list_view')}}"
                                       class="btn btn-default btn-small">L</a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        @if($edit_book)
            <div class="form-horizontal margin-top-twenty">

                <div class='form-group'>
                    <div class="control-label col-xs-2 text-left"><label for="book-title">{{trans('app.book_title')}}</label></div>
                    <div class="controls col-xs-9"><input type="text" maxlength="71" id="book-title"
                                                          name="book[name]" value="{{$book->name}}" class="form-control"/>
                    </div>
                </div>

                <div class='form-group'>
                    <div class="control-label col-xs-2 text-left"><label for="book-description">Description</label></div>
                    <div class="controls col-xs-9">
                        <textarea id="book-description" rows="5" name="book[description]" class="form-control">{{$book->description}}</textarea>
                    </div>
                </div>
            </div>
        @endif
        <div class="row margin-top-twenty">

            <div class="col-md-12">
                @if($photos)
                    @foreach($photos as $photo)

                        <div class="col-md-3">
                            <div class="col-md-12 background-gray border-gray margin-five">
                                <div class="text-right"><input type="checkbox" name="check[{{$photo->id}}]"/></div>
                                <div><img src="{{$directory . '/' . $photo->id . '_' . $photo->filename}}"
                                          width="100%"/>
                                </div>
                                <div>
                                    <div class="margin-top-twenty">
                                        <div class="form-group">
                                            <label for="password">{{ trans('app.title') }}</label>
                                            <input type="text" class="form-control" name="photos[{{$photo->id}}][title]"
                                                   value="{{$photo->title}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="description">{{ trans('app.description') }}</label>
                                         <textarea name="photos[{{$photo->id}}][description]"
                                                   style="resize: none; overflow-y: hidden; height: 40px; width:100%;">{{$photo->description}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div id="notification-danger" class="alert alert-danger">
                        {{trans('app.no_photos_found')}}
                    </div>
                @endif
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
@section('footer')
    @include('partials.title-only-footer')
@endsection