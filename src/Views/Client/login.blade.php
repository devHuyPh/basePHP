@extends('layouts.master')

@section('title')
Login
@endsection

@section('content')

<div class="container" style="margin-top:100px">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-header text-center">
                    <h3>Login</h3>
                </div>
                @if(!empty($_SESSION['error']))
                <div class="alert alert-warning mt-3 mb-3">
                    {{$_SESSION['error']}}
                </div>
                @php
                unset($_SESSION['error']);
                @endphp
                @endif
                <div class="card-body">
                    <form action="{{url('handle-login')}}" method="post">
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                        <small>Do not have an account? <a href="{{url('signin')}}">SignIn</a></small>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection