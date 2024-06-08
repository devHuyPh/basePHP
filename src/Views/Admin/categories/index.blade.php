@extends('layouts.master')

@section('title')
    Quản lý Danh mục
@endsection

@section('content')
    

    <!-- <a href="{{ url("admin/products/create") }}" class="btn btn-primary">Thêm mới</a> -->

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                
                <th>NAME</th>
                <th>ACTION</th>
                
            </tr>
        </thead>
        <tbody>

            @foreach ($categories as  $category)
                <tr>
                    <td>{{ $category['id'] }}</td>
                    
                    <td>{{ $category['name'] }}</td>
                    <td>               
                        <a href="{{ url("admin/categories/{$category['id']}/show") }}" class="btn btn-info">Xem</a>
                        <a href="{{ url("admin/categories/{$category['id']}/edit") }}" class="btn btn-warning">Sửa</a>
                        <a href="{{ url("admin/categories/{$category['id']}/delete") }}"
                            onclick="return confirm('Chắc chắn xóa không?');" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
