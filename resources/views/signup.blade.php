@extends('master')

@section('content')

    <div class="modal-dialog" style="width:780px;">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-center">Welcome to Rockstar Project</h2>
                <h4 class="text-center">The new way to become awesome.</h4>
            </div>
            <div class="modal-body">
                @include('partials.form-errors')
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
            <div class="modal-footer">
                <p class="text-center">Already have an account? <a href="/signin">Sign In</a></p>
            </div>
        </div>
        <!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
@endsection