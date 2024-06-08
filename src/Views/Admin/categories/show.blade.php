@extends('layouts.master')

@section('title')
Xem chi tiết: {{ $categories['name'] }}
@endsection

@section('content')
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>NAME</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($category as $key => $value)
        <tr>
            <td>{{ $key }}</td>
            <td>{{$value}}</td>
        </tr>
        @endforeach

    </tbody>
</table>
@endsection