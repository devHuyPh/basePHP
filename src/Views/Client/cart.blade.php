    @extends('layouts.master')

    @section('title')
    Cart of you
    @endsection

    @section('content')
    <!-- breadcrumb -->
    <div class="container" style="margin-top:100px">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
                Giỏ hàng
            </span>
        </div>
    </div>

    <!-- Giỏ hàng -->
    <div class="bg0 p-t-75 p-b-85">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                    <div class="m-l-25 m-r--40 m-lr-0-xl">
                        <div class="wrap-table-shopping-cart">
                            @if(!empty($_SESSION['cart']) || !empty($_SESSION['cart-'.$_SESSION['user']['id']]))
                            <table class="table-shopping-cart">
                                <thead>
                                    <tr class="table_head">
                                        <th class="column-2">Tên sản phẩm</th>
                                        <th class="column-2">Hình ảnh</th>
                                        <th class="column-5">Số lượng</th>
                                        <th class="column-2">Giá</th>
                                        <th class="column-2">Tổng</th>
                                        <th class="column-2">Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $cart = $_SESSION['cart'] ?? $_SESSION['cart-'.$_SESSION['user']['id']];
                                    $totalPrice = 0;
                                    @endphp
                                    @foreach ($cart as $item)
                                    @php
                                    $itemTotal = $item['quantity'] * ($item['price_sale'] ?: $item['price_regular']);
                                    $totalPrice += $itemTotal;
                                    @endphp
                                    <tr>
                                        <td>{{ $item['name'] }}</td>
                                        <td>
                                            <img src="{{ asset($item['img_thumbnail']) }}" width="70px" alt="">
                                        </td>
                                        <td>
                                            @php
                                            $url = url('cart/quantityDec') . '?productID=' . $item['id'];

                                            if (isset($_SESSION['cart-' . $_SESSION['user']['id']])) {
                                            $url .= '&cartID=' . $_SESSION['cart_id'];
                                            }
                                            @endphp
                                            <a class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m" href="{{ $url }}">-</a>

                                            {{ $item['quantity'] }}

                                            @php
                                            $url = url('cart/quantityInc') . '?productID=' . $item['id'];

                                            if (isset($_SESSION['cart-' . $_SESSION['user']['id']])) {
                                            $url .= '&cartID=' . $_SESSION['cart_id'];
                                            }
                                            @endphp
                                            <a class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m" href="{{ $url }}">+</a>
                                        </td>
                                        <td>{{ $item['price_sale'] ?: $item['price_regular'] }}</td>
                                        <td>{{ $itemTotal }}</td>
                                        <td>
                                            @php
                                            $url = url('cart/remove') . '?productID=' . $item['id'];

                                            if (isset($_SESSION['cart-' . $_SESSION['user']['id']])) {
                                            $url .= '&cartID=' . $_SESSION['cart_id'];
                                            }
                                            @endphp
                                            <a onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="{{ $url }}">Xóa</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @endif
                        </div>
                    </div>
                </div>

                <form action="{{ url('order/checkout') }}" method="post" class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                    <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                        <h4 class="mtext-109 cl2 p-b-30">
                            Thông tin của bạn
                        </h4>

                        <div class="flex-w flex-t bor12 p-b-13">
                            <?php
                            if (isset($_SESSION['errors'])) {
                                foreach ($_SESSION['errors'] as $error) {
                                    echo '<div class="alert alert-danger">' . $error . '</div>';
                                }
                                unset($_SESSION['errors']);
                            }

                            if (isset($_SESSION['success'])) {
                                echo '<div class="alert alert-success">' . $_SESSION['success'] . '</div>';
                                unset($_SESSION['success']);
                            }
                            ?>

                        </div>

                        <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                            <div class="size-208 w-full-ssm">
                                <span class="stext-110 cl2">
                                    Tên
                                </span>
                            </div>

                            <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                                <div class="bor8 bg0 m-b-22">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" value="{{ $_SESSION['user']['name'] ?? null }}" name="user_name" placeholder="Nhập tên">
                                </div>
                            </div>
                            <div class="size-208 w-full-ssm">
                                <span class="stext-110 cl2">
                                    Địa chỉ
                                </span>
                            </div>

                            <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                                <div class="bor8 bg0 m-b-22">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" value="{{ $_SESSION['user']['address'] ?? null }}" name="user_address" placeholder="Nhập địa chỉ">
                                </div>
                            </div>
                            <div class="size-208 w-full-ssm">
                                <span class="stext-110 cl2">
                                    Số điện thoại
                                </span>
                            </div>

                            <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                                <div class="bor8 bg0 m-b-22">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" value="{{ $_SESSION['user']['phone'] ?? null }}" name="user_phone" placeholder="Nhập số điện thoại">
                                </div>
                            </div>
                            <div class="size-208 w-full-ssm">
                                <span class="stext-110 cl2">
                                    Email
                                </span>
                            </div>

                            <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                                <div class="bor8 bg0 m-b-22">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" value="{{ $_SESSION['user']['email'] ?? null }}" name="user_email" placeholder="Nhập email">
                                </div>
                            </div>
                        </div>
                        <div class="flex-w flex-t p-t-27 p-b-33">
                            <div class="size-208">
                                <span class="mtext-101 cl2">
                                    Tổng cộng:
                                </span>
                            </div>

                            <div class="size-209 p-t-1">
                                <span class="mtext-110 cl2">
                                    {{ $totalPrice }}
                                </span>
                            </div>
                        </div>
                        <button type="submit" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                            Tiến hành thanh toán
                        </button>
                    </div>
                </form>
            </div>
        </div>
        @endsection