<?php

// Website có các trang là:
//      Trang chủ
//      Giới thiệu
//      Sản phẩm
//      Chi tiết sản phẩm
//      Liên hệ

// Để định nghĩa được, điều đầu tiên làm là phải tạo Controller trước
// Tiếp theo, khai function tương ứng để xử lý
// Bước cuối, định nghĩa đường dẫn

// HTTP Method: get, post, put (path), delete, option, head

use Admin\Base\Controllers\Client\AboutController;
use Admin\Base\Controllers\Client\ContactController;
use Admin\Base\Controllers\Client\HomeController;
use Admin\Base\Controllers\Client\LoginController;
use Admin\Base\Controllers\Client\ProductController;
use Admin\Base\Controllers\Client\ShopController;
use Admin\Base\Controllers\Client\SigninController;
use Admin\Base\Controllers\Client\CartController;
use Admin\Base\Controllers\Client\OrderController;

$router->get( '/',                  HomeController::class       . '@index');
$router->get( '/about',             AboutController::class      . '@index');

$router->get( '/shop',              ShopController::class       . '@index');
$router->post( '/contact/store',    ContactController::class    . '@store');

$router->get( '/productDetail/{id}',        ProductController::class    . '@detail');
// $router->get( '/products/{id}',          ProductController::class    . '@detail');

$router->get( '/login',                 LoginController::class    . '@showFormLogin');
$router->post( '/handle-login',         LoginController::class    . '@login');
$router->get( '/logout',                LoginController::class    . '@logout');

$router->get( '/signin',                SigninController::class    . '@showFormSignin');
$router->post( '/handle-signin',        SigninController::class    . '@signin');

$router->get( '/cart',                  CartController::class       . '@viewCart');
$router->post( '/handle-signin',        SigninController::class     . '@signin');



$router->get('cart/add' ,              CartController::class .'@add');
$router->get('cart/quantityInc' ,      CartController::class .'@quantityInc');
$router->get('cart/quantityDec' ,      CartController::class .'@quantityDec');
$router->get('cart/add' ,              CartController::class .'@add');
$router->get('cart/remove' ,           CartController::class .'@remove');
$router->get('cart/detail' ,           CartController::class .'@detail');

$router->post('order/checkout',         OrderController::class . '@checkout');

$router->get('cart/history' ,           OrderController::class .'@orderHistory');


