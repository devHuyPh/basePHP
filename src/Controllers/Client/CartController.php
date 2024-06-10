<?php

namespace Admin\Base\Controllers\Client;

use Admin\Base\Commons\Controller;
use Admin\Base\Commons\Helper;
use Admin\Base\Models\Cart;
use Admin\Base\Models\CartDetail;
use Admin\Base\Models\Product;
use Admin\Base\Models\Order;
use Admin\Base\Models\OrderDetail;

class CartController extends Controller
{

    private Product $product;

    private Cart $cart;

    private CartDetail $cartDetail;
    public Order $order;
    public OrderDetail $orderDetail;

    public function __construct()
    {
        $this->product      = new Product();
        $this->cart         = new Cart();
        $this->cartDetail   = new CartDetail();
        $this->order        = new Order();
        $this->orderDetail  = new OrderDetail();
    }
    public function viewCart()
    {
        $this->renderViewClient('cart');
    }




    public function add()
    { //thêm
        //lấy htông tin san pham theo id
        $product = $this->product->findByID($_GET['productID']);


        //khoi tao secction gio hang
        //check dnag nhap chưa?

        $key = 'cart';
        if (isset($_SESSION['user'])) {

            $key .= '-' . $_SESSION['user']['id'];
        }

        if (!isset($_SESSION[$key][$product['id']])) {

            $_SESSION[$key][$product['id']] = $product + ['quantity' => $_GET['quantity'] ?? 1];
        } else {

            $_SESSION[$key][$product['id']]['quantity'] += $_GET['quantity'];
        }

        // Helper::debug($_SESSION);



        //neu dang nhap thi them vào csdl
        if (isset($_SESSION['user'])) {
            $conn = $this->cart->getConnection();
            // Helper::debug($conn);
            // $conn->beginTransaction();
            try {


                $cart = $this->cart->findByUserID($_SESSION['user']['id']);

                if (empty($cart)) {
                    $this->cart->insert([
                        'user_id' => $_SESSION['user']['id']
                    ]);
                }

                //code...


                $cartID = $cart['id'] ?? $conn->lastInsertId();

                $_SESSION['cart_id'] = $cartID;

                $this->cartDetail->deleteByCartId($cartID);
                foreach ($_SESSION[$key] as $productID => $item) {

                    $this->cartDetail->insert([
                        'cart_id' => $cartID,
                        'product_id' => $productID,
                        'quantity' => $item['quantity']
                    ]);
                }

                // $conn->commit();
            } catch (\Throwable $th) {
                //throw $th;

                // $conn->rollback();
            }

            header('Location: ' . url('cart/detail'));
        }



        //chua dang nhap 
    }

    public function detail()
    {
        $this->renderViewClient('cart');
    }
    public function quantityInc()
    { //tăng
        // Lấy ra dữ liệu từ cart_details để đảm bảo n có tồn tại bản ghi

        // Thay đổi trong SESSION
        $key = 'cart';
        if (isset($_SESSION['user'])) {
            $key .= '-' . $_SESSION['user']['id'];
        }


        $_SESSION[$key][$_GET['productID']]['quantity'] += 1;

        // Thay đổi trong DB
        if (isset($_SESSION['user'])) {
            $this->cartDetail->updateByCartIDAndProductID(
                $_GET['cartID'],
                $_GET['productID'],
                $_SESSION[$key][$_GET['productID']]['quantity']
            );
        }

        header('Location: ' . url('cart/detail'));
        exit;
    }
    public function quantityDec()
    { //giảm
        // Lấy ra dữ liệu từ cart_details để đảm bảo n có tồn tại bản ghi

        // Thay đổi trong SESSION
        $key = 'cart';
        if (isset($_SESSION['user'])) {
            $key .= '-' . $_SESSION['user']['id'];
        }

        if ($_SESSION[$key][$_GET['productID']]['quantity'] > 1) {
            $_SESSION[$key][$_GET['productID']]['quantity'] -= 1;
        }

        // Thay đổi trong DB
        if (isset($_SESSION['user'])) {
            $this->cartDetail->updateByCartIDAndProductID(
                $_GET['cartID'],
                $_GET['productID'],
                $_SESSION[$key][$_GET['productID']]['quantity']
            );
        }

        header('Location: ' . url('cart/detail'));
        exit;
    }
    public function remove()
    { // xóa item or xóa trắng
        $key = 'cart';
        if (isset($_SESSION['user'])) {
            $key .= '-' . $_SESSION['user']['id'];
        }

        unset($_SESSION[$key][$_GET['productID']]);

        if (isset($_SESSION['user'])) {
            $this->cartDetail->deleteByCartIDAndProductID($_GET['cartID'], $_GET['productID']);
        }

        header('Location: ' . url('cart/detail'));
        exit;
    }

    
}
