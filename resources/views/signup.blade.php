@extends('master')

@section('content')

    <div class="custom-modal">

        {!! Form::open(['url' => 'signup']) !!}
        <div class="form-group">
            <label for="first-name">First Name</label>
            <input type="text" name="first_name" id="first-name" class="form-control" placeholder="First Name">
        </div>
        <div class="form-group">
            <label for="last-name">Last Name</label>
            <input type="text" name="last_name" id="last-name" class="form-control" placeholder="Last Name">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password"
                   placeholder="Minimum 6 characters">
        </div>
        <div class="form-group">
            <button type="submit" class="form-control btn btn-success">Sign Up</button>
        </div>
        {!! Form::close() !!}
    </div>
@endsection