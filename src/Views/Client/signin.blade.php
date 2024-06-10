@extends('layouts.master')

@section('title')
Product Detail
@endsection

@section('content')

<div class="container" style="margin-top:100px">

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-header text-center">
                    <h3>Sign In</h3>
                </div>
                <div class="card-body">
                    @if (!empty($_SESSION['errors']))
                    <div class="alert alert-warning">
                        <ul>
                            @foreach ($_SESSION['errors'] as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>

                        @php
                        unset($_SESSION['errors']);
                        @endphp
                    </div>
                    @endif
                    <form method="post" action="{{url('/handle-signin')}}">
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="avatar" class="form-label">Avatar:</label>
                            <input type="file" class="form-control" id="avatar" placeholder="Enter avatar" name="avatar">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="text" class="form-control" id="password" placeholder="Enter password" name="password">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="password" class="form-label">Confirm Password:</label>
                            <input type="text" class="form-control" id="confirm_password" placeholder="Enter confirm_password" name="confirm_password">
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <small>Do you already have an account <a href="{{url('login')}}">Log up</a></small>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

@endsection