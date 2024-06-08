@extends('layouts.master')

@section('title')
Danh sách User
@endsection

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
            <div class="white_card_body">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h1>Danh sách User</h1>
                        <div class="box_right d-flex lms_block">
                            <div class="serach_field_2">
                                <div class="search_inner">
                                    <form Active="#">
                                        <div class="search_field">
                                            <input type="text" placeholder="Search content here...">
                                        </div>
                                        <button type="submit"> <i class="ti-search"></i> </button>
                                    </form>
                                </div>
                            </div>
                            <div class="add_button ms-2">
                                <a href="{{ url('admin/users/create') }}" data-bs-toggle="modal" data-bs-target="#addcategory" class="btn_1">Thêm mới</a>
                            </div>
                        </div>

                    </div>
                    <div class="QA_table mb_30">

                        <table class="table  ">
                        <!-- lms_table_active -->
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">IMAGE</th>
                                    <th scope="col">NAME</th>
                                    <th scope="col">EMAIL</th>
                                    <th scope="col">TYPE</th>
                                    <th scope="col">CREATED AT </th>
                                    <th scope="col">UPDATED AT </th>
                                    <th scope="col">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td><?= $user['id'] ?></td>
                                    <td>
                                        <img src="{{ asset($user['avatar']) }}" alt="" width="100px">
                                    </td>
                                    <td><?= $user['name'] ?></td>
                                    <td><?= $user['email'] ?></td>
                                    <td><?= $user['type'] ?></td>
                                    <td><?= $user['created_at'] ?></td>
                                    <td><?= $user['updated_at'] ?></td>
                                    <td>

                                        <a class="btn btn-info" href="{{ url('admin/users/' . $user['id'] . '/show') }}">Xem</a>
                                        <a class="btn btn-warning" href="{{ url('admin/users/' . $user['id'] . '/edit') }}">Sửa</a>
                                        <a class="btn btn-danger" href="{{ url('admin/users/' . $user['id'] . '/delete') }}" onclick="return confirm('Chắc chắn xóa không?')">Xóa</a>

                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <div class="col-lg-12">
                            <div class="white_box mb_30">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item {{ $page == 1 ? 'disabled' : '' }}">
                                            <a class="page-link " href=" {{ url('admin/users?page=' . $page - 1) }}" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>

                                        @for ($i = 1; $i <= $totalPage; $i++) <li class="page-item {{ $i == $page ? 'active' : '' }}"><a class="page-link" href="{{ url('admin/users?page=') . $i }}">{{ $i }}</a></li>
                                            @endfor


                                            <li class="page-item {{ $page == $totalPage ? 'disabled' : '' }}">
                                                <a class="page-link " href="{{ $page < $totalPage ? url('admin/users?page=' . $page + 1) : '' }}" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                </a>
                                            </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection