@extends('layouts.master')

@section('title')
    Thêm mới Danh mục
@endsection

@section('content')
    

    <form action="{{ url('admin/categories/store') }}" enctype="multipart/form-data" method="POST">
        <div class="row">
            <div class="col-md-6">
                
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                </div>
                
            </div>

            
        </div>
        
        <button type="submit" class="btn btn-primary mt-5">Submit</button>
    </form>
@endsection
