<?php

namespace Admin\Base\Controllers\Client;

use Admin\Base\Commons\Controller;
use Admin\Base\Models\Cart;
use Admin\Base\Models\CartDetail;
use Admin\Base\Models\Order;
use Admin\Base\Models\OrderDetail;
use Admin\Base\Models\User;
use Rakit\Validation\Validator;

class OrderController extends Controller
{
    public User $user;
    public Order $order;
    public OrderDetail $orderDetail;
    private Cart $cart;
    private CartDetail $cartDetail;

    public function __construct()
    {
        $this->user         = new User();
        $this->order        = new Order();
        $this->orderDetail  = new OrderDetail();
        $this->cart         = new Cart();
        $this->cartDetail   = new CartDetail();
    }

    public function checkout()
    {
        // Chưa đăng nhập thì  tạo tài khoản
        $userID = $_SESSION['user']['id'] ?? null;
        if (!$userID) {
            $conn = $this->user->getConnection();

            $this->user->insert([
                'name' => $_POST['user_name'],
                'email' => $_POST['user_email'],
                'password' => password_hash($_POST['user_email'], PASSWORD_DEFAULT),
                'type' => 'member',
                'is_active' => 0,
            ]);

            $userID = $conn->lastInsertId();
        }
        $validator = new Validator;
        $validation = $validator->make($_POST, [
            'user_name'    => 'required|max:100',
            'user_email'   => 'required|email|max:100',
            'user_phone'   => 'required|min:10|max:15',
            'user_address' => 'required|max:255',
        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location: ' . url('cart'));
            exit;
        }

        // Thêm dữ liệu vào Order & OrderDetail
        $conn = $this->order->getConnection();
        $this->order->insert([
            'user_id' => $userID,
            'user_name' => $_POST['user_name'],
            'user_email' => $_POST['user_email'],
            'user_phone' => $_POST['user_phone'],
            'user_address' => $_POST['user_address'],
        ]);

        $orderID = $conn->lastInsertId();

        $key = 'cart';
        if (isset($_SESSION['user'])) {
            $key .= '-' . $_SESSION['user']['id'];
        }

        foreach ($_SESSION[$key] as $productID => $item) {
            $this->orderDetail->insert([
                'order_id' => $orderID,
                'product_id' => $productID,
                'quantity' => $item['quantity'],
                'price_regular' => $item['price_regular'],
                'price_sale' => $item['price_sale'],
            ]);
        }

        // Xóa dữ liệu trong Cart + CartDetail theo CartID - $_SESSION['cart_id']
        $cartID = $_SESSION['cart_id'] ?? null;
        if ($cartID) {
            $this->cartDetail->deleteByCartID($cartID);
            $this->cart->deleteByCartID($cartID);
        }


        // Xóa trong SESSION
        unset($_SESSION[$key]);

        if (isset($_SESSION['user'])) {
            unset($_SESSION['cart_id']);
        }

         // Thiết lập thông báo thành công
         $_SESSION['success'] = 'thanh toan thanh cong';

        header('Location: ' . url(''));
        exit;
    }

    public function orderHistory()
    {
        $userID = $_SESSION['user']['id'] ?? null;
        if (!$userID) {
            header('Location: ' . url('login'));
            exit;
        }

        $orders = $this->order->findByUserID($userID);
        $orderDetails = [];

        foreach ($orders as $order) {
            $orderDetails[$order['id']] = $this->orderDetail->findByOrderID($order['id']);
        }
        
        $this->renderViewClient('history',
            [
                'orders' => $orders,
                'orderDetails' => $orderDetails,
            ]
        );
    }
}
