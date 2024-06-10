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
        [$products, $totalPage] =$this->product->paginateHome($_GET['page'] ?? 1, 9);

        $this -> renderViewClient('products.index',[
            'products' => $products,
            'totalPage' => $totalPage,
            'page'  => $_GET['page'] ?? 1
        ]);
    }

    public function detail($id) {
        $product = $this->product->findByID($id);
        

        $this->renderViewClient('productDetail', [
            'product' => $product,
        ]);
    }
}