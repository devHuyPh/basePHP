<?php

namespace Admin\Base\Controllers\Admin;

use Admin\Base\Commons\Controller;
use Admin\Base\Commons\Helper;
use Admin\Base\Models\Order;
use Admin\Base\Models\OrderDetail;
use Admin\Base\Models\User;

class OrderController extends Controller
{
    public Order $order;
    public OrderDetail $orderDetail;
    public User $user;

    public function __construct()
    {
        $this->order = new Order();
        $this->orderDetail = new OrderDetail();
        $this->user = new User();
    }

    public function index()
    {
        $orders = $this->order->getAllOrders();

        $this->renderViewAdmin('order.index', [
            'orders' => $orders,
        ]);
    }

    public function show($id)
    {
        $order = $this->order->find($id);
        $orderDetails = $this->orderDetail->adminfindByOrderID($id);
        $user = $this->user->find($order['user_id']);
        // Helper::debug($orderDetails);
        $this->renderViewAdmin('order.show', [
            'order' => $order,
            'orderDetails' => $orderDetails,
            'user' => $user,
        ]);
        
    }

    public function updateStatus($id)
    {
        $status = $_POST['status_delivery'] ?? null;

        if ($status !== null) {
            $this->order->updateStatus($id, $status);
        }

        return $this->index(); 
    }
}
