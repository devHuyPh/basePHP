@extends('layouts.master')

@section('title')
    Xem chi tiết: {{ $product['name'] }}
@endsection

@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th>TRƯỜNG</th>
                <th>GIÁ TRỊ</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($product as $key => $value)
                <tr>
                    <td>{{ $key }}</td>
                    <td><?php
                        if($key=='img_thumbnail'){
                        ?>
                        <img src="{{ asset($product['img_thumbnail']) }}" width="100px" alt="">
                        <?php
                        }
                        else{
                            echo $value;
                        }
                    ?>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
