@extends('layouts.master')

@section('title')
Lịch sử đơn hàng
@endsection

@section('content')
<div class="container" style="margin-top:100px">
    <h3 class="ltext-103 cl5">
        Lịch sử đơn hàng
    </h3>

    @if(isset($_SESSION['success']))
    <div class="alert alert-success">
        {{ $_SESSION['success'] }}
    </div>
    <?php unset($_SESSION['success']); ?>
    @endif

    @if(isset($orders) && count($orders) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái thanh toán</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td>{{ $order['id'] }}</td>
                    <td>{{ $order['total'] }}</td>
                    <td>{{ $order['status_payment'] }}</td>
                </tr>
                <tr>
                    <td colspan="4">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                    <th>Tổng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderDetails[$order['id']] as $detail)
                                <tr>
                                    <!-- <td>{{ $detail['product_name'] }}</td> -->
                                    <td>{{ $detail['quantity'] }}</td>
                                    <td>{{ $detail['price_sale'] }}</td>
                                    <td>{{ $detail['quantity'] * $detail['price_sale'] }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Không có đơn hàng nào.</p>
    @endif
</div>
@endsection