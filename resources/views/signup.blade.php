@extends('master')

@section('content')

    <div class="custom-modal">

        {!! Form::open(['url' => 'signup']) !!}
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="password"
                   placeholder="Minimum 6 characters">
        </div>
        <div class="form-group">
            <button type="submit" class="form-control btn btn-success">Sign Up</button>
        </div>
        {!! Form::close() !!}
    </div>
@endsection