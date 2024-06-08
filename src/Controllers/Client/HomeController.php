<?php 

namespace Admin\Base\Controllers\Client;

use Admin\Base\Commons\Controller;
use Admin\Base\Models\Category;
use Admin\Base\Models\Product;

class HomeController extends Controller

{
    private Product $product;
    private Category $category;

    public function __construct()
    {
        $this->product = new Product();
        $this->category = new Category();
    }
    public function index() {

        [$products, $totalPage] =$this->product->paginate($_GET['page'] ?? 1);

        $this->renderViewClient('home', [
            'products' => $products,
            'totalPage' => $totalPage,
            'page' => $_GET['page'] ?? 1 ,
        ]);
    }
}