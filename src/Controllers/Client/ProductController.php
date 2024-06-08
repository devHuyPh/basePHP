<?php 

namespace Admin\Base\Controllers\Client;
use Admin\Base\Models\Product;


use Admin\Base\Commons\Controller;
use Admin\Base\Commons\Helper;
use Admin\Base\Models\Category;

class ProductController extends Controller
{
    private Product $product;
    private Category $category;

    public function __construct()
    {
        $this->product = new Product();
    }
    public function index() {
        echo __CLASS__ . '@' . __FUNCTION__;
    }

    public function detail($id) {
        $product = $this->product->findByID($id);
        

        $this->renderViewClient('productDetail', [
            'products' => $product,
        ]);
    }
}